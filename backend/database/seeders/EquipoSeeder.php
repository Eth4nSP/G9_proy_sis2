<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Equipo;
use Faker\Factory as Faker;

class EquipoSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $equipos = [];

        for ($i = 1; $i <= 10; $i++) {
            $equipos[] = [
                'nombre_equipo' => $this->generarNombreEquipo($faker), // Genera un nombre aleatorio
                'publicada' => rand(0,1),
            ];
        }

        Equipo::insert($equipos);
    }

    private function generarNombreEquipo($faker)
    {
        $adjetivos = ['Dinámico', 'Innovador', 'Ágil', 'Estratega', 'Veloz', 'Fuerte', 'Creativo'];
        $sustantivos = ['Tech', 'Solutions', 'Developers', 'Pioneers', 'Champions', 'Innovators', 'Titans'];

        return $faker->randomElement($adjetivos) . ' ' . $faker->randomElement($sustantivos);
    }
}
