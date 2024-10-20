<?php

namespace App\Services;

use App\Contracts\DepartamentoInterface;
use App\Models\Departamento;

class DepartamentoService implements DepartamentoInterface
{
    public function obtenerTodos()
    {
        return Departamento::all();
    }

    public function obtenerPorId($id)
    {
        return Departamento::findOrFail($id);
    }

    public function guardar(array $data)
    {
        return Departamento::create($data);
    }

    public function actualizar($id, array $data)
    {
        $departamento = Departamento::findOrFail($id);
        $departamento->update($data);
        return $departamento;
    }

    public function eliminar($id)
    {
        $departamento = Departamento::findOrFail($id);
        return $departamento->delete();
    }
}
