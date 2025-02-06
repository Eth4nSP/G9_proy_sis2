<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class EstudianteEquipo extends Model
{
    use HasFactory;

    protected $table = 'estudiante_equipo';

    public $timestamps = false;  // Si no tienes timestamps en esta tabla

    protected $primaryKey = ['id_equipo', 'id_estudiante'];

    protected $fillable = [
        'id_equipo', 'id_estudiante'
    ];
    public function equipos()
    {
        return $this->belongsToMany(Equipo::class, 'estudiante_equipo', 'id_estudiante', 'id_equipo');
    }

    public function estudiantes(){
        return $this->belongsToMany(Estudiante::class, 'estudiante', 'id_estudiante');
    }

}
