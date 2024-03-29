# kw_notify

![Build Status](https://github.com/alex-kalanis/kw_notify/actions/workflows/code_checks.yml/badge.svg)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/alex-kalanis/kw_notify/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/alex-kalanis/kw_notify/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/alex-kalanis/kw_notify/v/stable.svg?v=1)](https://packagist.org/packages/alex-kalanis/kw_notify)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.3-8892BF.svg)](https://php.net/)
[![Downloads](https://img.shields.io/packagist/dt/alex-kalanis/kw_notify.svg?v1)](https://packagist.org/packages/alex-kalanis/kw_notify)
[![License](https://poser.pugx.org/alex-kalanis/kw_notify/license.svg?v=1)](https://packagist.org/packages/alex-kalanis/kw_notify)
[![Code Coverage](https://scrutinizer-ci.com/g/alex-kalanis/kw_notify/badges/coverage.png?b=master&v=1)](https://scrutinizer-ci.com/g/alex-kalanis/kw_notify/?branch=master)

Notifications stored somewhere for later usage. Store them and return them.

## PHP Installation

```bash
composer.phar require alex-kalanis/kw_notify
```

(Refer to [Composer Documentation](https://github.com/composer/composer/blob/master/doc/00-intro.md#introduction) if you are not
familiar with composer)


## PHP Usage

1.) Use your autoloader (if not already done via Composer autoloader)

2.) Connect the "kalanis\kw_notify\Notification" into your app. Extends it for setting your case. See example.

3.) Create your own render and call notifications there.

4.) Just call notifications and your render
