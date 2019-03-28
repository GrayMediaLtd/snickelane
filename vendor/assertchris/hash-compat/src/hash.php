<?php

if (!function_exists("hash_pbkdf2")) {
    /**
     * PBKDF2 (Password-Based Key Derivation Function 2) Implementation, described in RFC 2898.
     *
     * @see http://php.net/manual/en/function.hash-pbkdf2.php
     *
     * @param string $hashAlgorithm
     * @param string $password
     * @param string $salt
     * @param int    $iterationCount
     * @param int    $keyLength
     * @param bool   $rawOutput
     *
     * @return string
     *
     * @throws InvalidArgumentException
     */
    function hash_pbkdf2($hashAlgorithm, $password, $salt, $iterationCount, $keyLength, $rawOutput = false)
    {
        $hashAlgorithm = strtolower($hashAlgorithm);

        if (!in_array($hashAlgorithm, hash_algos())) {
            throw new InvalidArgumentException("Invalid hash algorithm");
        }

        if ($iterationCount <= 0) {
            throw new InvalidArgumentException("Invalid iteration count");
        }

        if ($keyLength <= 0) {
            throw new InvalidArgumentException("Invalid key length");
        }

        $hashLength = strlen(hash($hashAlgorithm, null, true));

        if ($keyLength == 0) {
            $keyLength = $hashLength;
        }

        $result = "";

        $blockCount = ceil($keyLength / $hashLength);

        for ($block = 1; $block <= $blockCount; ++$block) {
            $key1 = $key2 = hash_hmac($hashAlgorithm, $salt . pack("N", $block), $password, true);

            for ($iteration = 1; $iteration < $iterationCount; ++$iteration) {
                $key2 ^= $key1 = hash_hmac($hashAlgorithm, $key1, $password, true);
            }

            $result .= $key2;
        }

        if ($rawOutput) {
            return substr($result, 0, $keyLength);
        }

        return substr(bin2hex($result), 0, $keyLength);
    }
}
