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

    public function index()
    {
        $Clients = Client::all();
        return response()->json(['error' => false, 'data' => $Clients, 'message' => 'all users']);
    }

    public function store(ClientRequest $request){

        $user=new Client;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password,["rounds"=>12]);
        $user->address=$request->address;
        $user->image="https://www.testhouse.net/wp-content/uploads/2021/11/default-avatar.jpg";

        $user->save();

        return response()->json($user);
    }

    public function show(string $id): JsonResponse
    {

        $oneClient = Client::find($id);

        if (!$oneClient) {
            return response()->json(['error' => true, 'message' => 'User no encontrado'], 404);
        }

        return response()->json(['error' => false, 'data' => $oneClient, 'message' => 'Un User encontrado'], 200);
    }


    public function update(ClientRequest $request, string $id): JsonResponse
    {

        $Client = Client::find($id);

        if (!$Client) {

            return response()->json(['error' => true, 'message' => 'User no encontrado'], 404);
        }

        $Client->update($request->all());

        $Client->save();


        return response()->json(['error' => false, 'data' => $Client, 'message' => 'User actualizado correctamente'], 200);
    }

    public function destroy(string $id)
    {
       $Client = Client::destroy($id);
       return response()->json(['error'=>false,'message'=>'eliminado satisfactoriamente']);
    }


    public function login(ClientRequest $request){
        
        
         $user = Client::where("email", $request->email)->first();

        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Incorrect password.'], 401);
        }
        $jwt=$this->jwtencoded($user);

        return response()->json(['token' => $jwt]);
    }


    private function jwtencoded($user){
        $key = 'example_key';

        $iat=time();
        $exp=$iat+300000;

        $payload = [
            'iss' => 'http://localhost:8000',
            'aud' => 'http://example.com',
            'iat' => $iat,
            'nbf' => $iat,
            'exp' => $exp,
            'userid'=>$user->id,
        ];

        $jwt = JWT::encode($payload, $key, 'HS256');
        return $jwt;
    }

    
}
