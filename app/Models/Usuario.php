<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Usuario extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Relación uno a muchos inversa
    public function pais(): BelongsTo
    {
        return $this->BelongsTo(Pais::class);
    }

    public function departamento(): BelongsTo
    {
        return $this->BelongsTo(Departamento::class);
    }

    public function municipio(): BelongsTo
    {
        return $this->BelongsTo(Municipio::class);
    }
}
