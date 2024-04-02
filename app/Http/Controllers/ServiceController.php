<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Spatie\FlareClient\Http\Response;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = service::all();
        return response()->json(['error' => false, 'data' => $services, 'message' => 'all users']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(request $request)
    {
        $serviceCreated =  service::create($request->all());
        return response()->json(["error" => false, 'data' => $serviceCreated, 'message' => 'usuario creado']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {

        $oneService = Service::find($id);

        if (!$oneService) {
            return response()->json(['error' => true, 'message' => 'Servicio no encontrado'], 404);
        }

        return response()->json(['error' => false, 'data' => $oneService, 'message' => 'Un servicio encontrado'], 200);
    }


    public function update(ServiceRequest $request, string $id): JsonResponse
    {

        $service = service::find($id);

        if (!$service) {

            return response()->json(['error' => true, 'message' => 'Servicio no encontrado'], 404);
        }

        $service->update($request->all());

        $service->save();


        return response()->json(['error' => false, 'data' => $service, 'message' => 'Servicio actualizado correctamente'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $service = service::destroy($id);
       return response()->json(['error'=>false,'message'=>'eliminado satisfactoriamente']);
    }
}
