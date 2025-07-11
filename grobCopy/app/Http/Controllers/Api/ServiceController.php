<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Obtener todos los servicios
    public function index()
    {
        return response()->json(Service::all());
    }

    // Guardar un nuevo servicio
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'nullable|string',
        ]);

        $service = Service::create($request->all());

        return response()->json($service, 201);
    }

    // Mostrar un solo servicio (opcional)
    public function show(Service $service)
    {
        return response()->json($service);
    }

    // Actualizar un servicio existente
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'nullable|string',
        ]);

        $service->update($request->all());

        return response()->json($service);
    }

    // Eliminar un servicio
    public function destroy(Service $service)
    {
        $service->delete();

        return response()->json(null, 204);
    }
}
