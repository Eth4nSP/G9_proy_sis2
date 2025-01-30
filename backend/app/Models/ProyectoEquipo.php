<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectoEquipo extends Model
{
    use HasFactory;

    protected $table = 'proyecto_equipo';

    public $timestamps = false;  // Si no tienes timestamps en esta tabla

    public $incrementing = false;
    protected $primaryKey = ['id_proyecto', 'id_equipo'];

    protected $fillable = [
        'id_proyecto', 'id_equipo'
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'id_proyecto', 'id_proyecto');
    }

    // Relación inversa con Equipo
    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'id_equipo', 'id_equipo');
    }
}
