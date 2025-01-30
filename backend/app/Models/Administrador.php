<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    protected $table = 'administradores';  // Especificamos la tabla si no sigue la convención de pluralización

    protected $primaryKey = 'id_administrador';  // Clave primaria

    protected $fillable = [
        'nombre', 'correo', 'contrasena'
    ];

    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'id_administrador');
    }
}

