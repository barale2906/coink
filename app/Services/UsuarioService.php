<?php

namespace App\Services;

use App\Contracts\UsuarioInterface;
use App\Models\Usuario;

class UsuarioService implements UsuarioInterface
{
    public function obtenerTodos()
    {
        return Usuario::with('municipio','departamento','pais')->get();
    }

    public function obtenerPorId($id)
    {
        return Usuario::with('municipio','departamento','pais')->findOrFail($id);
    }

    public function guardar(array $data)
    {
        return Usuario::create($data);
    }

    public function actualizar($id, array $data)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($data);
        return $usuario;
    }

    public function eliminar($id)
    {
        $usuario = Usuario::findOrFail($id);
        return $usuario->delete();
    }
}
