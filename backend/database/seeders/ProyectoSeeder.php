<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proyecto;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        
        Proyecto::create([
            'titulo_proyecto' => $this->generarNombreProyecto($faker),
            'aceptado' => 1, // Este grupo tiene el proyecto aceptado
        ]);
        
        Proyecto::create([
            'titulo_proyecto' => $this->generarNombreProyecto($faker),
            'aceptado' => 0, //rechazado
        ]);

        Proyecto::create([
            'titulo_proyecto' => $this->generarNombreProyecto($faker),
            'aceptado' => 2, //pendiente
        ]);
    }
    private function generarNombreProyecto($faker)
    {
        $temas = ['Sistema', 'Plataforma', 'Aplicación', 'Software', 'Red', 'Asistente', 'Inteligencia'];
        $enfoques = ['Educativo', 'Empresarial', 'Financiero', 'Deportivo', 'Médico', 'Social', 'Ambiental'];
        //$acciones = ['Innovador', 'Interactivo', 'Automatizado', 'Predictivo', 'Eficiente', 'Inteligente'];

        return $faker->randomElement($temas) . ' ' . $faker->randomElement($enfoques);
    }
}
