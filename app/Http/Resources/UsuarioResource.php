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
                    'pais' => PaisResource::collection($this->whenLoaded('pais')),
                    'departamento' => DepartamentoResource::collection($this->whenLoaded('departamento')),
                    'municipio' => MunicipioResource::collection($this->whenLoaded('municipio')),
                ];
    }
}
