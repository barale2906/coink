<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MunicipioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
                    'id' => $this->id,
                    'nombre' => $this->nombre,
                    'departamento' => DepartamentoResource::collection($this->whenLoaded('departamento')),
                    'usuarios' => UsuarioResource::collection($this->whenLoaded('usuarios')),
                ];
    }
}
