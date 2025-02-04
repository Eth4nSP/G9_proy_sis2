<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $table = 'proyecto';

    protected $primaryKey = 'id_proyecto';

    protected $fillable = [
        'nombre', 'descripcion', 'aceptado'
    ];

    public $timestamps = false;

    public function proyectoEquipos()
    {
        return $this->hasMany(ProyectoEquipo::class, 'id_proyecto', 'id_proyecto');
    }
}
