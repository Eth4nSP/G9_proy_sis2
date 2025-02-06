<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Estudiante;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create('es_ES'); // Configurar el locale a español
        $dominios = ['gmail.com', 'hotmail.com', 'yahoo.com'];
    
        for ($i = 1; $i <= 30; $i++) {
            // Generar datos aleatorios
            $nombre = $faker->firstName;
            $apellido_paterno = $faker->lastName;
            $apellido_materno = $faker->lastName;

            // Función para eliminar espacios y tildes
            $limpiarTexto = function ($texto) {
            $texto = str_replace(' ', '', $texto); // Eliminar espacios
            $texto = strtr($texto, [
                'Á' => 'A', 'É' => 'E', 'Í' => 'I', 'Ó' => 'O', 'Ú' => 'U',
                'á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ú' => 'u',
                'Ñ' => 'N', 'ñ' => 'n'
            ]); // Reemplazar tildes y ñ // Reemplazar tildes y ñ
            return $texto;
            };

            // Aplicar limpieza
            $nombreL = $limpiarTexto($nombre);
            $apellido_paterno = $limpiarTexto($apellido_paterno);
            $apellido_materno = $limpiarTexto($apellido_materno);

            // Generar nombre de cuenta
            $nombre_cuenta = $apellido_paterno. $nombreL . rand(0,99);
    
            // Generar correo
            $dominio = $dominios[array_rand($dominios)];
            $correo = strtolower( $apellido_paterno. $nombreL . '@' . $dominio);
    
            // Crear el estudiante en la base de datos
            Estudiante::create([
                'nombre_cuenta' => $nombre_cuenta,
                'nombre' => $nombre,
                'apellido_paterno' => $apellido_paterno,
                'apellido_materno' => $apellido_materno,
                'correo' => $correo,
            ]);
        }
    }
}
