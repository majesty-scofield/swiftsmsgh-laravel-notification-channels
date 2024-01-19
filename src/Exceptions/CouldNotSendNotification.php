<?php

namespace NotificationChannels\Swiftsmsgh\Exceptions;

class CouldNotSendNotification extends \Exception
{
    public static function swiftsmsghError(string $message, int $code): self
    {
        return new static(sprintf('Swiftsms-GH responded with error %d, message: %s', $code, $message), $code);
    }
}
