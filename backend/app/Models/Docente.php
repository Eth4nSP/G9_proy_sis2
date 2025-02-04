<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    public $table = 'docente';  // Especificamos la tabla si no sigue la convención de pluralización

    public $primaryKey = 'id_docente'; // Clave primaria

    public $fillable = [
        'nombre_cuenta', 'correo', 'nombre', 'apellido_paterno', 'apellido_materno', 'contrasena'
    ];

    public $timestamps = false;

    public function grupos()
    {
        return $this->hasMany(Grupo::class, 'id_docente');
    }
}
