<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    public $table = 'estudiante';  // Especificamos la tabla

    public $primaryKey = 'id_estudiante';  // Clave primaria

    public $fillable = [
        'nombre', 'apellido_paterno', 'apellido_materno', 'correo', 'fecha_nacimiento', 'telefono'
    ];

    public $timestamps = false;

    public function equipos()
    {
        return $this->belongsToMany(Equipo::class, 'estudiante_equipo', 'id_estudiante', 'id_equipo');
    }

    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'estudiantes_grupos', 'id_estudiante', 'id_grupo');
    }
}
