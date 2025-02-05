<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstudianteGrupo extends Model
{
    protected $table = 'estudiante_grupo';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'idEstudiante',
        'idGrupo',
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'id_Estudiante');
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'id_Grupo');
    }
}
