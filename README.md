https://github.com/benbjurstrom/livewire-mercure-demo/assets/12499093/62f8372f-d79c-4e5a-ba46-aacb9792b428

# Livewire Mercure Demo

This demo showcases the use of [Mercure](https://mercure.rocks/) (a modern substitute for WebSockets) to send real-time public and private messages in a [Laravel Livewire](https://livewire.laravel.com/) application—no page refresh or polling required.

## Quickstart
1. Clone the repository:`git clone https://github.com/benbjurstrom/livewire-mercure-demo.git`
2. Enter the directory: `cd livewire-mercure-demo`
3. Install php dependencies: `composer install`
4. Install node dependencies: `npm install && npm run build`
5. Start the docker environment: `./vendor/bin/sail up`
6. Run migrations and seeders: `./vendor/bin/sail artisan migrate:fresh --seed`
7. Access the app at `http://localhost/login`. Login with `user1@example.com` and `password`.
8. Use the Artisan command `php artisan message:send` to send a message.

## Technical Details
This repo was created from a fresh Laravel 10 install with the Laravel Breeze package added. From there everything needed to get Mercure up and running can be found in this diff: https://github.com/benbjurstrom/livewire-mercure-demo/commit/220ec5118c107f3c1cef7ddbf73d058e4744d0de
