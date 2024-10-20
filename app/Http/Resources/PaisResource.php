<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaisResource extends JsonResource
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
                    'departamentos' => DepartamentoResource::collection($this->whenLoaded('departamentos')),
                    'usuarios' => UsuarioResource::collection($this->whenLoaded('usuarios')),
                ];
    }
}
