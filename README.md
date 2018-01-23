# JsonHelper

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

JsonHelper - for easy JSON handling

## Install

Via Composer

``` bash
$ composer require johnykvsky/jsonhelper
```

Should work fine on PHP 5.6, but I didn't check that. Just change required PHP version in composer.json and maybe remove dev packages.

## Features

- Proper error handling on encode/decode
- By default decode to array
- Nice isValidJson() for checking
- convertNewLinesToCRLF() for arrays/strings, fix for some wierd newlines types witch makes encode() fail

## Usage

``` php
use johnykvsky\Utils\JsonHelper;

JsonHelper::encode(array('works' => 'fine'));
JsonHelper::decode('{"works:"fine"}');
JsonHelper::isValidJson('{"works:"fine"}');
JsonHelper::convertNewLinesToCRLF(array('wo\x0D\x0Arks' => 'fi\x0D\x0Ane'));

```

## Testing

``` bash
$ composer test
```

## Security

If you discover any security related issues, please email johnykvsky@protonmail.com instead of using the issue tracker.

## Credits

- [johnykvsky][link-author]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/johnykvsky/JsonHelper.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/johnykvsky/JsonHelper/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/johnykvsky/JsonHelper.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/johnykvsky/JsonHelper.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/johnykvsky/JsonHelper.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/johnykvsky/JsonHelper
[link-travis]: https://travis-ci.org/johnykvsky/JsonHelper
[link-scrutinizer]: https://scrutinizer-ci.com/g/johnykvsky/JsonHelper/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/johnykvsky/JsonHelper
[link-downloads]: https://packagist.org/packages/johnykvsky/JsonHelper
[link-author]: https://github.com/johnykvsky
