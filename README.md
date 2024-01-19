# Swiftsmsgh Notification Channel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/laravel-notification-channels/swiftsmsgh.svg?style=flat-square)](https://packagist.org/packages/swiftsmsgh-laravel-notification-channels/swiftsmsgh)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/laravel-notification-channels/swiftsmsgh/master.svg?style=flat-square)](https://travis-ci.org/laravel-notification-channels/swiftsmsgh)
[![StyleCI](https://styleci.io/repos/339892204/shield)](https://styleci.io/repos/339892204)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel-notification-channels/swiftsmsgh.svg?style=flat-square)](https://packagist.org/packages/laravel-notification-channels/swiftsmsgh)

📲  [Swiftsmsgh](https://app.swiftsmsgh.com) Notifications Channel for Laravel

## Contents

- [Installation](#installation)
	- [Setting up the Swiftsmsgh service](#setting-up-the-Swiftsmsgh-service)
- [Usage](#usage)
	- [Available Message methods](#available-message-methods)
- [Changelog](#changelog)
- [Testing](#testing)
- [Security](#security)
- [Contributing](#contributing)
- [Credits](#credits)
- [License](#license)


## Installation

```bash
composer require swiftsmsgh-laravel-notification-channels/swiftsmsgh
```

### Configuration

Add your Swiftsmsgh SENDER_ID and API_TOKEN to your `.env`

```php
SWIFTSMSGH_API_TOKEN=100|hjwewrahwjew8234wej # always required
SWIFTSMSGH_SENDER_ID=Demo # always required
```

Add the configuration to your `services.php` config file:

```php
'swiftsmsgh' => [
    'sender_id' => env('SWIFTSMSGH_SENDER_ID', 'sender_id'),
    'api_token' => env('SWIFTSMSGH_API_TOKEN', 'api_token'),
]
```

### Setting up the Swiftsmsgh service

You'll need a Swiftsms-GH account. Head over to their [website](https://www.app.swiftsmsgh.com/) and create or login to your account.

Navigate to `API Integration` and then `API Token` in the sidebar to copy existing one or generate an API Token.

## Usage

You can use the channel in your `via()` method inside the notification:

```php
use Illuminate\Notifications\Notification;
use \NotificationChannels\Swiftsmsgh\SwiftsmsghMessage;
use \NotificationChannels\Swiftsmsgh\SwiftsmsghChannel;

class LoginNeedsVerification extends Notification
{
    public function via($notifiable)
    {
        return [SwiftsmsghChannel::class];
    }

    public function Swiftsmsgh($notifiable)
    {
        return (new SwiftsmsghMessage)
            ->content("Task #{$notifiable->id} is complete!")
            ->from('My App');
    }
}
```

In your notifiable model, make sure to include a `routeNotificationForSwiftsmsgh()` method, which returns a phone number including country code.

```php
public function routeNotificationForSwiftsmsgh()
{
    return $this->phone; // 0200000001
}
```

### Available methods

`sender()`: Sets the sender's name or phone number.

`content()`: Set a content of the notification message.

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Security

If you discover any security related issues, please email support@Swiftsmsgh.com instead of using the issue tracker.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Swiftsmsgh](https://github.com/majesty-scofield)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
