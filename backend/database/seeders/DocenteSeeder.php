<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Docente;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //$faker = Faker::create();
        $faker = Faker::create('es_ES');
        $docentes = [
            ['nombre' => $faker->firstName, 'apellido_paterno' => $faker->lastName, 'apellido_materno' => $faker->lastName],
            ['nombre' => $faker->firstName, 'apellido_paterno' => $faker->lastName, 'apellido_materno' => $faker->lastName],
            ['nombre' => $faker->firstName, 'apellido_paterno' => $faker->lastName, 'apellido_materno' => $faker->lastName],
        ];
    
        $dominios = ['gmail.com', 'hotmail.com', 'yahoo.com'];
    
        foreach ($docentes as $key => $docente) {
            // Generar nombre de cuenta
            $nombre_cuenta = $docente['apellido_paterno'] . $docente['nombre'] . rand(0, 99);
    
            // Generar correo
            $dominio = $dominios[array_rand($dominios)];  // Seleccionar aleatoriamente un dominio
            $correo = strtolower(substr($docente['nombre'], 0, 2) . substr($docente['apellido_paterno'], 0, 3) . substr($docente['apellido_materno'], 0, 2) . '@' . $dominio);
    
            // Generar contraseña aleatoria basada en el nombre y apellido
            $password = substr($docente['nombre'], 0, 2) . substr($docente['apellido_paterno'], 0, 2) . rand(100, 999);
    
            // Crear el docente en la base de datos
            Docente::create([
                'nombre' => $docente['nombre'],
                'apellido_paterno' => $docente['apellido_paterno'],
                'apellido_materno' => $docente['apellido_materno'],
                'correo' => $correo,
                'nombre_cuenta' => $nombre_cuenta,
                'contrasena' => $password,
            ]);
        }
    }
}
