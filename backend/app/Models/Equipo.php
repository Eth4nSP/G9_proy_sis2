<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $table = 'equipo';

    protected $primaryKey = 'id_equipo';

    protected $fillable = [
        'nombre_equipo', 'publicada'
    ];

    public $timestamps = false;

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class, 'estudiante_equipo', 'id_equipo', 'id_estudiante');
    }

    // Relación muchos a muchos con Grupos

    public function proyectoEquipos()
    {
        return $this->hasMany(ProyectoEquipo::class, 'id_equipo', 'id_equipo');
    }
}

