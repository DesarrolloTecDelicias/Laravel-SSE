<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpKernel\HttpCache\ResponseCacheStrategy;

class Cors
{
    /**
     * Handle an incoming request.
     * 
     *  @param \Illuminate\Http\Request  $request
     *  @param \Closure $next
     *  @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, Application');

        return $response;
        // header("Access-Control-Allow-Origin: *");
        // // Allow 
        // $headers = [
        //     'Access-Control-Allow-Origin' => 'POST, GET, OPTIONS, PUT, DELETE',
        //     'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
        //     'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization',
        // ];
        // if($request->getMethod() == "OPTIONS"){
        //     //
        //     return response()->json('OK', 200, $headers);
        // }
        // $response = $next($request);
        // foreach ($headers as $key => $value){
        //     $response->header($key, $value);
        // }
        // return $response;
    }
}
