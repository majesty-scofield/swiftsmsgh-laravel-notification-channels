<?php

namespace NotificationChannels\Swiftsmsgh;

use DateTimeInterface;

class SwiftsmsghMessage
{
    /** @var string */
    public string $content;

    /** @var string|null */
    public ?string $sender;

    /** @var string|null */
    public ?string $campaign;

    /** @var string|null */
    public ?string $reference;

    /** @var DateTimeInterface|null */
    public ?DateTimeInterface $sendAt;

    public function __construct(string $content = '')
    {
        $this->content = $content;
    }

    public function content(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function sender(string $sender): self
    {
        $this->sender = $sender;

        return $this;
    }

    public function sendAt(DateTimeInterface $sendAt): self
    {
        $this->sendAt = $sendAt;

        return $this;
    }

    public function campaign(string $campaign): self
    {
        $this->campaign = $campaign;

        return $this;
    }

    public function reference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }
}
