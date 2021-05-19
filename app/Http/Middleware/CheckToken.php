<?php

namespace App\Http\Middleware;


use Closure;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;

class CheckToken
{
    public function handle($request, Closure $next)
    {
        try {
            $passportEndpoint = 'your_passport_endpoint_here';
            $client = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => $request->header('Authorization')
            ]);

            $response = $client->get($passportEndpoint);
            if ($response->status() === 200) {
                $body = $response->object();
                //do some stuff with response here, like setting the global logged in user


                return $next($request);
            }
        }
        catch (RequestException $exception) {

        }

        return abort(401, 'You are not authenticated to this service');
    }
}
