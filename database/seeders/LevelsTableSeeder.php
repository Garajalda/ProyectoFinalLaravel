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
            'name' => 'Nivel 1',
            'project_id' => 1
        ]);
        Level::create([
            'name' => 'Nivel 2',
            'project_id' => 1
        ]);
        Level::create([
            'name' => 'Nivel 1',
            'project_id' => 2
        ]);
        Level::create([
            'name' => 'Nivel 2',
            'project_id' => 2
        ]);
    }
}
