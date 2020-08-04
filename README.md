# php-teams-connector

[![Version](https://poser.pugx.org/bereznii/php-teams-connector/version)](//packagist.org/packages/bereznii/php-teams-connector)
[![Latest Unstable Version](https://poser.pugx.org/bereznii/php-teams-connector/v/unstable)](//packagist.org/packages/bereznii/php-teams-connector)
[![License](https://poser.pugx.org/bereznii/php-teams-connector/license)](//packagist.org/packages/bereznii/php-teams-connector)
[![Total Downloads](https://poser.pugx.org/bereznii/php-teams-connector/downloads)](//packagist.org/packages/bereznii/php-teams-connector)

The PHP package to easily interact with Microsoft Teams Connector API via Incoming Webhook.
The goal is to provide user with ability to easily create his own message card and send them to desired channel.

## Install

Via Composer

``` bash
$ composer require bereznii/php-teams-connector
```

## Usage

``` php
$card = new \Bereznii\TeamsConnector\Services\MessageCard();
$card->setAppName('Your App')
    ->setMessage('Hello World')
    ->setContext(__METHOD__)
    ->setStatus('DEBUG');

$request = new Bereznii\TeamsConnector\Services\Request($card, '<WEBHOOK_URL>');
$result = $request->send();
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email bereznii.d@gmail.com instead of using the issue tracker.

## Credits

- [Dmytro Bereznii][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/bereznii/php-teams-connector.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/bereznii/php-teams-connector/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/bereznii/php-teams-connector.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/bereznii/php-teams-connector.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/bereznii/php-teams-connector.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/bereznii/php-teams-connector
[link-travis]: https://travis-ci.org/bereznii/php-teams-connector
[link-scrutinizer]: https://scrutinizer-ci.com/g/bereznii/php-teams-connector/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/bereznii/php-teams-connector
[link-downloads]: https://packagist.org/packages/bereznii/php-teams-connector
[link-author]: https://github.com/bereznii
[link-contributors]: ../../contributors
