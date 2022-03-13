<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'name' => 'Proyecto Sistemas de gestión empresarial',
            'description' => 'El proyecto consiste en desarrollar con laravel un modelo crud.'
        ]);
        Project::create([
            'name' => 'Proyecto Móviles',
            'description' => 'El proyecto consiste en desarrollar un juego para móviles.'
        ]);
    }
}
