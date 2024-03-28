<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Requests\ClientRequest;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    //
    public function create(ClientRequest $request){

        $user=new Client;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password,["rounds"=>12]);
        $user->address=$request->address;

        $user->save();

        return response()->json($user);
    }

    public function login(ClientRequest $request){

        $user=Client::where("email",$request->email)->first();

        if (!$user) return response()->json("user not found");

        $checkPassword=Hash::check($request->password,$user->password);

        if (!$checkPassword) return response()->json("password not found");

        return response()->json($user);
    }

}
