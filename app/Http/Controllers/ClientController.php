<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\ClientRequest;
use Illuminate\Support\Facades\Hash;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class ClientController extends Controller
{   

    //
    public function create($request){

        $user=new Client;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password,["rounds"=>12]);
        $user->address=$request->address;

        $user->save();

        return response()->json($user);
    }

    public function login(ClientRequest $request){
        
        
         $user = Client::where("email", $request->email)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Incorrect password.'], 401);
        }

        return response()->json(['token' => $jwt]);
    }

    private function jwtencoded($user){
        $key = 'example_key';
        $payload = [
            'iss' => 'http://localhost:8000',
            'aud' => 'http://example.com',
            'iat' => 1356999524,
            'nbf' => 1357000000,
            'userid'=>$user->id,
        ];

        $jwt = JWT::encode($payload, $key, 'HS256');
        return $jwt;
    }

    
}
