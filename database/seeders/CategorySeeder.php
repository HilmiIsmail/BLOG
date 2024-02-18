<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            'informática' => 'Catagoria relacionada con la informática ',
            'deporte' => 'Catagoria relacionada con deportes',
            'comida' => 'Catagoria relacionada con comida y cocina',
            'anime' => 'Catagoria relacionada con anime y manga',
            'viaje' => 'Catagoria relacionada con viajes',
        ];

        foreach ($categorias as $nombre => $descripcion) {
            Category::create([
                'nombre' => $nombre,
                'descripcion' => $descripcion,
            ]);
        }
    }
}
