<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class EstudianteGrupoEquipo extends Model
{
    use HasFactory;

    protected $table = 'estudiante_grupo_equipo';

    public $timestamps = false;  // Si no tienes timestamps en esta tabla

    protected $primaryKey = ['id_grupo', 'id_estudiante', 'id_equipo'];

    protected $fillable = [
        'id_grupo', 'id_estudiante', 'id_equipo'
    ];
    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'estudiante_grupo_equipo', 'id_estudiante', 'id_grupo');
    }

    public function equipos()
    {
        return $this->belongsToMany(Equipo::class, 'estudiante_grupo_equipo', 'id_estudiante', 'id_equipo');
    }

    public function estudiantes(){
        return $this->belongsToMany(Estudiante::class, 'estudiante', 'id_estudiante');
    }

}
