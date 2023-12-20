<div class="space-y-2">
    @foreach($messages as $message)
    <div class="flex items-start gap-2.5">

        <svg class="w-8 h-8 rounded-full" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>

        <div class="flex flex-col w-full max-w-[320px] leading-1.5">
            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                @if($message['private'])
                    <span class="text-sm font-semibold text-red-800">Private Message</span>
                @else
                    <span class="text-sm font-semibold text-gray-900">Public Message</span>
                @endif

                <span class="text-sm font-normal text-gray-500">{{$message['time']}}</span>
            </div>
            <p class="text-sm font-normal py-2 text-gray-900">{{$message['message']}}</p>
        </div>
    </div>
    @endforeach
    @if(empty($messages))
            <div class="text-center">
                <div class="h-">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                    </svg>
                </div>
                <h3 class="mt-2 text-sm font-semibold text-gray-900">To create messages run:</h3>
                <pre class="mt-1  inline font-mono text-xs">php artisan message:send</pre>
            </div>
    @endif
</div>
