<?php

namespace App\Http\Controllers;

use App\Contracts\DepartamentoInterface;
use App\Http\Resources\DepartamentoResource;
use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    protected $departamentoService;

    public function __construct(DepartamentoInterface $departamentoService)
    {
        $this->departamentoService = $departamentoService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departamentos = $this->departamentoService->obtenerTodos();
        return DepartamentoResource::collection($departamentos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $departamento = $this->departamentoService->guardar($request->all());
        return new DepartamentoResource($departamento);
    }

    /**
     * Display the specified resource.
     */
    public function show(Departamento $departamento)
    {
        $departamento = $this->departamentoService->obtenerPorId($departamento->id);
        return new DepartamentoResource($departamento);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departamento $departamento)
    {
        $departamento = $this->departamentoService->actualizar($departamento->id, $request->all());
        return new DepartamentoResource($departamento);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departamento $departamento)
    {
        $this->departamentoService->eliminar($departamento->id);
        return response()->json($departamento, 204);
    }
}
