<?php

namespace App\Http\Controllers;

use App\Contracts\MunicipioInterface;
use App\Http\Requests\MunicipioRequest;
use App\Http\Requests\MunicipioUpdateRequest;
use App\Http\Resources\MunicipioResource;
use App\Models\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    protected $municipioService;

    public function __construct(MunicipioInterface $municipioService)
    {
        $this->municipioService = $municipioService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $municipios = $this->municipioService->obtenerTodos();
        return MunicipioResource::collection($municipios);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MunicipioRequest $request)
    {
        $municipio = $this->municipioService->guardar($request->validated());
        return new MunicipioResource($municipio);
    }

    /**
     * Display the specified resource.
     */
    public function show(Municipio $municipio)
    {
        $municipio = $this->municipioService->obtenerPorId($municipio->id);
        return new MunicipioResource($municipio);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MunicipioUpdateRequest $request, Municipio $municipio)
    {
        $municipio = $this->municipioService->actualizar($municipio->id, $request->validated());
        return new MunicipioResource($municipio);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Municipio $municipio)
    {
        $this->municipioService->eliminar($municipio->id);
        return response()->json($municipio, 204);
    }
}
