<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstudianteGrupoEquipoSeeder extends Seeder
{
    public function run()
    {
        // Datos con formato {id_grupo, id_estudiante, id_equipo}
        $datos = [
            [1, 1, 1], [1, 2, 1], [1, 3, 1], [1, 4, 2], [1, 5, 2], [1, 6, 2], [1, 7, 3], [1, 8, 3], [1, 9, 3], [1, 10, 2], [1, 11, 1], [1, 12, 1],
            [2, 13, 1], [2, 14, 1], [2, 15, 1], [2, 16, 2], [2, 17, 2], [2, 18, 2], [2, 19, 3], [2, 20, 3], [2, 21, 3], [2, 22, 2], [2, 23, 1], [2, 24, 1],
            [2, 25, 2], [2, 26, 2], [2, 27, 3], [2, 28, 3], [2, 29, 1], [2, 30, 1]
        ];

        // Insertar los datos en la base de datos
        foreach ($datos as $dato) {
            DB::table('estudiante_grupo_equipo')->insert([
                'id_grupo' => $dato[0],
                'id_estudiante' => $dato[1],
                'id_equipo' => $dato[2],
            ]);
        }
    }
}
