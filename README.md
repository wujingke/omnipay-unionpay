Labs7IN0\UnionPay
===

**UnionPay driver for the Omnipay PHP payment processing library**

[![Build Status](https://travis-ci.org/labs7in0/omnipay-unionpay.svg)](https://travis-ci.org/labs7in0/omnipay-unionpay)

## Installation

Omnipay is installed via [Composer](http://getcomposer.org/). To install, simply add it
to your `composer.json` file:

```json
{
    "require": {
        "labs7in0/omnipay-unionpay": "~2.0"
    }
}
```

And run composer to update your dependencies:

    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar update

## Basic Usage

The following gateways are provided by this package:

* UnionPay WEB (UnionPay Website Payments)
* UnionPay WAP (UnionPay Mobile Payments)
* UnionPay Non-redirect (Payment with binded UnionPay Account)
* UnionPay Pay (Pay to your somebody actively)

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay)
repository.

## TODO

* [ ] UnionPay basic class
* [ ] UnionPay WEB
* [ ] UnionPay WAP
* [ ] UnionPay Non-redirect
* [ ] UnionPay Back pay

## Donate us

[Donate us](https://7in0.me/#donate)

## License
 The MIT License (MIT)

 More info see [LICENSE](LICENSE)
