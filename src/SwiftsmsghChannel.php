<?php

namespace NotificationChannels\Swiftsmsgh;

use Illuminate\Notifications\Notification;
use NotificationChannels\Swiftsmsgh\Exceptions\CouldNotSendNotification;
use Swiftsms\Swiftsmsgh;

class SwiftsmsghChannel
{
    /** @var Swiftsmsgh */
    private Swiftsmsgh $client;

    public function __construct(Swiftsmsgh $client)
    {
        $this->client = $client;
    }

    /**
     * @throws CouldNotSendNotification
     */
    public function send($notifiable, Notification $notification): void
    {
        $to = $notifiable->routeNotificationFor('Swiftsmsgh');

        if (! $to) {
            $to = $notifiable->routeNotificationFor(SwiftsmsghChannel::class);
        }

        if (! $to) {
            return;
        }

        $message = $notification->toSwiftsmsgh($notifiable);

        if (is_string($message)) {
            $message = new SwiftsmsghMessage($message);
        }

        if (! $message instanceof SwiftsmsghMessage) {
            return;
        }

        $response = $this->client->send_sms(
            $to,
            $message->content
        );

        if ($response->code !== 200) {
            throw CouldNotSendNotification::swiftsmsghError($response->message ?? '', $response->code ?? 500);
        }
    }
}
