<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProjectUser;
class ProjectUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectUser::create([
            'project_id' => 1,
            'user_id' => 3,
            'level_id' => 1
        ]);
        ProjectUser::create([
            'project_id' => 1,
            'user_id' => 4,
            'level_id' => 2
        ]);
    }
}
