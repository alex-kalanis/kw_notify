# kw_notify

Notifications stored somewhere for later usage.

## PHP Installation

```
{
    "require": {
        "alex-kalanis/kw_notify": "dev-master"
    },
    "repositories": [
        {
            "type": "http",
            "url":  "https://github.com/alex-kalanis/kw_notify.git"
        }
    }
}
```

(Refer to [Composer Documentation](https://github.com/composer/composer/blob/master/doc/00-intro.md#introduction) if you are not
familiar with composer)


## PHP Usage

1.) Use your autoloader (if not already done via Composer autoloader)

2.) Add some external packages with connection to the local or remote services.

3.) Connect the "kalanis\kw_notify\Notification" into your app. Extends it for setting your case. See example.

4.) Extend your libraries by interfaces inside the package.

5.) Just call setting and render
