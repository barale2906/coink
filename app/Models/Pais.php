<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pais extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Relación uno a muchos
    public function departamentos() : HasMany
    {
        return $this->hasMany(Departamento::class);
    }

    public function usuarios() : HasMany
    {
        return $this->hasMany(Usuario::class);
    }
}
