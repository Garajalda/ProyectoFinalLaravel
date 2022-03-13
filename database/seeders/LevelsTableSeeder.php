<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Level;
class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'name' => 'Atención por teléfono',
            'project_id' => 1
        ]);
        Level::create([
            'name' => 'Envío técnico',
            'project_id' => 1
        ]);
        Level::create([
            'name' => 'Pedir ayuda',
            'project_id' => 2
        ]);
        Level::create([
            'name' => 'Consulta especializada',
            'project_id' => 2
        ]);
    }
}
