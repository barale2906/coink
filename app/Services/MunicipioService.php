<?php

namespace App\Services;

use App\Contracts\MunicipioInterface;
use App\Models\Municipio;

class MunicipioService implements MunicipioInterface
{
    public function obtenerTodos()
    {
        return Municipio::with('usuarios')->get();
    }

    public function obtenerPorId($id)
    {
        return Municipio::with('usuarios')->findOrFail($id);
    }

    public function guardar(array $data)
    {
        return Municipio::create($data);
    }

    public function actualizar($id, array $data)
    {
        $municipio = Municipio::findOrFail($id);
        $municipio->update($data);
        return $municipio;
    }

    public function eliminar($id)
    {
        $municipio = Municipio::findOrFail($id);
        return $municipio->delete();
    }
}
