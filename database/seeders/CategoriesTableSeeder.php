<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Categoría 1',
            'project_id' => 1
        ]);
        Category::create([
            'name' => 'Categoría 2',
            'project_id' => 1
        ]);
        Category::create([
            'name' => 'Categoría 1',
            'project_id' => 2
        ]);
        Category::create([
            'name' => 'Categoría 2',
            'project_id' => 2
        ]);
    }
}
