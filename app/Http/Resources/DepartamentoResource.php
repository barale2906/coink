<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartamentoResource extends JsonResource
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
                    'pais_id'=> $this->pais_id,
                    'municipios' => MunicipioResource::collection($this->whenLoaded('municipios')),
                    'usuarios' => UsuarioResource::collection($this->whenLoaded('usuarios')),
                ];
    }
}
