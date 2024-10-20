<?php

namespace App\Contracts;

interface MunicipioInterface
{
    public function obtenerTodos();
    public function obtenerPorId($id);
    public function guardar(array $data);
    public function actualizar($id, array $data);
    public function eliminar($id);
}
