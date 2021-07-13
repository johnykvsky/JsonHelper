# JsonHelper

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
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

## Code checking

``` bash
$ composer phpstan
$ composer phpstan-max
```

## Security

If you discover any security related issues, please email johnykvsky@protonmail.com instead of using the issue tracker.

## Credits

- [johnykvsky][link-author]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/johnykvsky/JsonHelper.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/johnykvsky/JsonHelper.svg?style=flat-square
[ico-github-actions]: https://github.com/johnykvsky/JsonHelper/actions/workflows/php.yml/badge.svg

[link-packagist]: https://packagist.org/packages/johnykvsky/JsonHelper
[link-downloads]: https://packagist.org/packages/johnykvsky/JsonHelper
[link-author]: https://github.com/johnykvsky
[link-github-actions]: https://github.com/johnykvsky/JsonHelper/actions