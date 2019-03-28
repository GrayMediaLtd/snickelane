# hash-compat

[![Build Status](http://img.shields.io/travis/assertchris/hash-compat.svg?style=flat-square)](https://travis-ci.org/assertchris/hash-compat)
[![Code Quality](http://img.shields.io/scrutinizer/g/assertchris/hash-compat.svg?style=flat-square)](https://scrutinizer-ci.com/g/assertchris/hash-compat)
![Code Coverage](http://img.shields.io/scrutinizer/coverage/g/assertchris/hash-compat.svg?style=flat-square)
[![Version](http://img.shields.io/packagist/v/assertchris/hash-compat.svg?style=flat-square)](https://packagist.org/packages/assertchris/hash-compat)
[![License](http://img.shields.io/packagist/l/assertchris/hash-compat.svg?style=flat-square)](licence.md)

Provides forward compatibility with the `hash_*` functions that ship with PHP 5.5.

## Installation

```sh
$ composer require assertchris/hash-compat
```

## Usage

```
$salt = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);

$pbkdf2 = hash_pbkdf2("sha256", "password", $salt, 1000, 20);
```

## Caution

The PBKDF2 method should not be used for hashing passwords for storage. `password_hash()` or `crypt()` with `CRYPT_BLOWFISH` are better suited for password storage.

## Security Vulnerabilities

If you have found a security issue, please contact the author directly at [cgpitt@gmail.com](mailto:cgpitt@gmail.com).

## License

```
The MIT License (MIT)

Copyright (c) 2015 Christopher Pitt

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
```
