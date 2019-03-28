<?php

namespace PasswordCompat;

use InvalidArgumentException;
use PHPUnit_Framework_TestCase;

class HashPBKDF2Test extends PHPUnit_Framework_TestCase
{
    /**
     * Official RFC 2898 vectors.
     *
     * @see https://www.ietf.org/rfc/rfc2898.txt
     *
     * @return array
     */
    public function officialVectors()
    {
        return array(
            array(
                array(
                    "hashAlgorithm"  => "sha1",
                    "password"       => "password",
                    "salt"           => "salt",
                    "iterationCount" => 1,
                    "keyLength"      => 20,
                    "derivedKey"     => "0c60c80f961f0e71f3a9",
                    "rawDerivedKey"  => "0c60c80f961f0e71f3a9b524af6012062fe037a6",
                )
            ),
            array(
                array(
                    "hashAlgorithm"  => "sha1",
                    "password"       => "password",
                    "salt"           => "salt",
                    "iterationCount" => 2,
                    "keyLength"      => 20,
                    "derivedKey"     => "ea6c014dc72d6f8ccd1e",
                    "rawDerivedKey"  => "ea6c014dc72d6f8ccd1ed92ace1d41f0d8de8957",
                )
            ),
            array(
                array(
                    "hashAlgorithm"  => "sha1",
                    "password"       => "password",
                    "salt"           => "salt",
                    "iterationCount" => 4096,
                    "keyLength"      => 20,
                    "derivedKey"     => "4b007901b765489abead",
                    "rawDerivedKey"  => "4b007901b765489abead49d926f721d065a429c1",
                )
            ),
            array(
                array(
                    "hashAlgorithm"  => "sha1",
                    "password"       => "passwordPASSWORDpassword",
                    "salt"           => "saltSALTsaltSALTsaltSALTsaltSALTsalt",
                    "iterationCount" => 4096,
                    "keyLength"      => 25,
                    "derivedKey"     => "3d2eec4fe41c849b80c8d8366",
                    "rawDerivedKey"  => "3d2eec4fe41c849b80c8d83662c0e44a8b291a964cf2f07038",
                )
            ),
            array(
                array(
                    "hashAlgorithm"  => "sha1",
                    "password"       => "pass\0word",
                    "salt"           => "sa\0lt",
                    "iterationCount" => 4096,
                    "keyLength"      => 16,
                    "derivedKey"     => "56fa6aa75548099d",
                    "rawDerivedKey"  => "56fa6aa75548099dcc37d7f03425e0c3",
                )
            ),
        );
    }

    /**
     * @dataProvider officialVectors
     *
     * @param array $vector
     */
    public function testOfficialVectorsForHashPBKDF2(array $vector)
    {
        $this->assertEquals(
            $vector["derivedKey"],
            hash_pbkdf2(
                $vector["hashAlgorithm"],
                $vector["password"],
                $vector["salt"],
                $vector["iterationCount"],
                $vector["keyLength"],
                false
            )
        );

        $this->assertEquals(
            $vector["rawDerivedKey"],
            bin2hex(
                hash_pbkdf2(
                    $vector["hashAlgorithm"],
                    $vector["password"],
                    $vector["salt"],
                    $vector["iterationCount"],
                    $vector["keyLength"],
                    true
                )
            )
        );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidAlgorithmCausesExceptions()
    {
        hash_pbkdf2(
            "foo",
            "password",
            "salt",
            1000,
            0
        );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidIterationCountCausesExceptions()
    {
        hash_pbkdf2(
            "sha1",
            "password",
            "salt",
            -1,
            0
        );
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidKeyLengthCausesExceptions()
    {
        hash_pbkdf2(
            "sha1",
            "password",
            "salt",
            1000,
            -1
        );
    }
}
