<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsuarioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
                    'id'        => $this->id,
                    'nombre'    => $this->nombre,
                    'telefono'  => $this->telefono,
                    'direccion' => $this->direccion,
                    'pais' => new PaisResource($this->whenLoaded('pais')),
                    'departamento' => new DepartamentoResource($this->whenLoaded('departamento')),
                    'municipio' => new MunicipioResource($this->whenLoaded('municipio')),
                ];
    }
}
