<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grupo;
use Faker\Factory as Faker;
use Carbon\Carbon;

class GrupoSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $hoy = Carbon::now();

        $grupos = [
            [
                'numero_grupo' => 'Grupo 1',
                'id_docente' => 1,
                'fecha_inicio' => $hoy->toDateString(),
                'fecha_grupo_inicio' => $hoy->copy()->addDays(1)->toDateString(),
                'fecha_grupo_fin' => $hoy->copy()->addDays(15)->toDateString(),
                'fecha_proyecto_inicio' => $hoy->copy()->addDays(16)->toDateString(),
                'fecha_proyecto_fin' => $hoy->copy()->addDays(31)->toDateString(),
                'fecha_fin' => $hoy->copy()->addDays(32)->toDateString(),
            ],
            [
                'numero_grupo' => 'Grupo 2',
                'id_docente' => 2,
                'fecha_inicio' => $hoy->copy()->addDays(0)->toDateString(), // Ajuste para evitar fechas iguales
                'fecha_grupo_inicio' => $hoy->copy()->addDays(1)->toDateString(),
                'fecha_grupo_fin' => $hoy->copy()->addDays(15)->toDateString(),
                'fecha_proyecto_inicio' => $hoy->copy()->addDays(16)->toDateString(),
                'fecha_proyecto_fin' => $hoy->copy()->addDays(31)->toDateString(),
                'fecha_fin' => $hoy->copy()->addDays(32)->toDateString(),
            ],
        ];

        Grupo::insert($grupos);
    }
}

