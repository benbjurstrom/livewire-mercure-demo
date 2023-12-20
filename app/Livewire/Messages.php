<?php

namespace App\Livewire;

use Illuminate\Support\Carbon;
use Livewire\Component;

class Messages extends Component
{
    public array $messages = [];

    public function getListeners()
    {
        $userId = auth()->user()->id;

        return [
            "mercure:public.newMessage" => 'addMessage',
            "mercure:private.{$userId}.newMessage" => 'addPrivateMessage',
        ];
    }

    public function addMessage(array $event, bool $private = false)
    {
        $newMessage = [
            'time' => Carbon::now()->format('g:i:sa'),
            'message' => $event['data']['payload'],
            'private' => $private,
        ];
        $this->messages[] = $newMessage;
    }

    public function addPrivateMessage(array $event)
    {
       $this->addMessage($event, true);
    }

    public function render()
    {
        return view('livewire.messages');
    }
}
