<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProyectoEquipo;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ProyectoEquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        
        proyectoequipo::create([
            'id_proyecto' => 1,
            'id_equipo' => 1, // Este grupo tiene el proyecto aceptado
         //   'fecha_entrega' => now(),
        ]);
        
        proyectoequipo::create([
            'id_proyecto' => 2,
            'id_equipo' => 2, // Este grupo tiene el proyecto aceptado
          //  'fecha_entrega' => now(),
        ]);

        proyectoequipo::create([
            'id_proyecto' => 3,
            'id_equipo' => 3, // Este grupo tiene el proyecto aceptado
          //  'fecha_entrega' => now(),
        ]);
    }
}
