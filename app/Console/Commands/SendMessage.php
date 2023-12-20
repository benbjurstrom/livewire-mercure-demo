<?php

namespace App\Console\Commands;

use App\Events\NewMessage;
use App\Events\NewPrivateMessage;
use Illuminate\Console\Command;
use function Laravel\Prompts\text;
use function Laravel\Prompts\select;

class SendMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'message:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends a message to the Mercure hub.';

    /**
     * Execute the console command. This function accepts user input and dispatches an event containing the contents of the input.
     */
    public function handle()
    {
        $type = select(
            'Private or public?',
            ['Public', 'Private'],
        );

        if($type === 'Private') {
            $userId = text(
                label: 'What is the user ID?',
                default: '1',
            );
        }

        if(isset($userId)){
            $message = text(
                label: 'What is your private message?',
                default: 'I have a secret to tell you!',
            );

            broadcast(new NewPrivateMessage($message, $userId));
            $this->info('Message was sent!');
            return;
        }

        $message = text(
            label: 'What is your public message?',
            default: 'Hello everyone!',
        );
        broadcast(new NewMessage($message));
        $this->info('Message was sent!');
    }
}
