<?php

namespace App\Services;

use App\Contracts\PaisInterface;
use App\Models\Pais;

class PaisService implements PaisInterface
{
    public function obtenerTodos()
    {
        return Pais::all();
    }

    public function obtenerPorId($id)
    {
        return Pais::findOrFail($id);
    }

    public function guardar(array $data)
    {
        return Pais::create($data);
    }

    public function actualizar($id, array $data)
    {
        $pais = Pais::findOrFail($id);
        $pais->update($data);
        return $pais;
    }

    public function eliminar($id)
    {
        $pais = Pais::findOrFail($id);
        return $pais->delete();
    }
}
