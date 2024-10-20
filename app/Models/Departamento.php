<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Departamento extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Relación uno a muchos
    public function municipios() : HasMany
    {
        return $this->hasMany(Municipio::class);
    }

    public function usuarios() : HasMany
    {
        return $this->hasMany(Usuario::class);
    }

    //Relación uno a muchos inversa
    public function pais(): BelongsTo
    {
        return $this->BelongsTo(Pais::class);
    }
}
