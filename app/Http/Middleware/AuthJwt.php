<?php

namespace App\Http\Middleware;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\ClientRequest;


class AuthJwt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->header('Authorization')) return response()->json(['header' => "you dont have a header"]);
        
        $authorizationHeader = $request->header('Authorization');

       $split=explode(" ",$authorizationHeader);
       $token = $split[1];
       $decode=$this->jwtdecoded($token);

       if (!$decode) return response()->json(['token' => "you dont have token or has been expired "]);
       
        return $next($request);
    }
    
    private function jwtdecoded($jwt){
        $key = 'example_key';
        $decoded = JWT::decode($jwt, new Key($key, 'HS256'));

        return $decoded;
    }
}   
