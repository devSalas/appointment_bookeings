<?php

namespace App\Http\Controllers;
use App\Models\appointment;
use Illuminate\Http\Request;
use App\Http\Requests\AppointmentRequest;
use App\Http\Controllers\ClientController;

class AppointmentController extends Controller
{   

    /* protected  $clientController;

    public function __construct()
    {
        $this->clientController =new ClientController;
    } */

    public function index()
    {
        $appointment = appointment::all();
        return response()->json(['error' => false, 'data' => $appointment, 'message' => 'all appoinments']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AppointmentRequest $request)
    {   
        /* Agregar manejo de error no existe client_id*/
        
       /*  $userExist=$this->clientController->show($request->client_id);

        if ($userExist) return response()->json(['error' => true, 'message' => 'User no encontrado'], 404); */

        $serviceCreated =  appointment::create($request->all());

        return response()->json(["error" => false, 'data' => $serviceCreated, 'message' => 'appointment creado']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {

        $oneService = Service::find($id);

        if (!$oneService) {
            return response()->json(['error' => true, 'message' => 'appointment no encontrado'], 404);
        }

        return response()->json(['error' => false, 'data' => $oneService, 'message' => 'Un appointment encontrado'], 200);
    }


    public function update(AppointmentRequest $request, string $id): JsonResponse
    {

        $appointment = appointment::find($id);

        if (!$appointment) {

            return response()->json(['error' => true, 'message' => 'appointment no encontrado'], 404);
        }

        $appointment->update($request->all());

        $appointment->save();


        return response()->json(['error' => false, 'data' => $appointment, 'message' => 'appointment actualizado correctamente'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $appointment = appointment::destroy($id);
       return response()->json(['error'=>false,'message'=>'appointment eliminado satisfactoriamente']);
    }
}
