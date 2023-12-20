<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Duijker\LaravelMercureBroadcaster\Broadcasting\Channel as MercureChannel;

class NewMessage implements ShouldBroadcast
{
    /**
     * Create a new event instance.
     */
    public function __construct(
        public string $payload
    ) {}

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new MercureChannel(
                'public.newMessage',
                true
            )
        ];
    }
}
