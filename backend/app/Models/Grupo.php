<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $table = 'grupo';

    protected $primaryKey = 'id_grupo';

    protected $fillable = [
        'numero_grupo', 'fecha_inicio', 'fecha_fin', 'fecha_grupo_inicio', 'fecha_grupo_fin', 
        'fecha_proyecto_inicio', 'fecha_proyecto_fin', 'id_docente'
    ];

    public function docente()
    {
        return $this->belongsTo(Docente::class, 'id_docente');
    }

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class, 'estudiante_grupos', 'id_grupo', 'id_estudiante');
    }

    // Relación muchos a muchos con Equipos



}
