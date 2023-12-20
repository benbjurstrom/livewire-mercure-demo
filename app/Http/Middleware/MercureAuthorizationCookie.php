<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key\InMemory;
use Symfony\Component\HttpFoundation\Response;

class MercureAuthorizationCookie
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        return $response->withCookie(
                $this->createCookie($request->user(), $request->secure())
            );
    }

    private function createCookie($user, bool $secure)
    {
        if($user){
            $privateSubs = [
                'private.' . $user->id . '.{event}'
            ];
        }

        // Add topic(s) this user has access to
        // This can also be URI Templates (to match several topics), or * (to match all topics)
        $subscriptions = array_merge([
            'public.{event}'
        ], $privateSubs ?? []);

        $jwtConfiguration = Configuration::forSymmetricSigner(
            new Sha256(),
            InMemory::plainText(config('broadcasting.connections.mercure.secret'))
        );

        $token = $jwtConfiguration->builder()
            ->withClaim('mercure', ['subscribe' => $subscriptions])
            ->getToken($jwtConfiguration->signer(), $jwtConfiguration->signingKey())
            ->toString();

        return Cookie::make(
            'mercureAuthorization',
            $token,
            15,
            '/', // or which path you have mercure running
            parse_url(config('broadcasting.connections.mercure.url'), PHP_URL_HOST),
            $secure,
            true,
        );
    }
}
