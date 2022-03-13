<?php

namespace Database\Seeders;

use App\Models\Incident;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class IncidentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Incident::create([
            'title' => 'Primera incidencia',
            'description' => 'Se cierra la página desde el año pasado.',
            'severity' => 'N',
            'category_id' =>2,
            'project_id' =>1,
            'level_id' =>1,
            'client_id' =>2,
            'support_id' =>3
        ]);
    }
}
