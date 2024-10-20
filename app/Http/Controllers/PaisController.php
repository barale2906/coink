<?php

namespace App\Http\Controllers;

use App\Contracts\PaisInterface;
use App\Http\Resources\PaisResource;
use App\Models\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    protected $paisService;

    public function __construct(PaisInterface $paisService)
    {
        $this->paisService = $paisService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paises = $this->paisService->obtenerTodos();
        return PaisResource::collection($paises);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pais = $this->paisService->guardar($request->validated());
        return new PaisResource($pais);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pais = $this->paisService->obtenerPorId($id);
        return new PaisResource($pais->load('departamentos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pais = $this->paisService->actualizar($id, $request->validated());
        return new PaisResource($pais);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pais $pais)
    {
        $this->paisService->eliminar($pais->id);
        return response()->json($pais, 204);
    }
}
