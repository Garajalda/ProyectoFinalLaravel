<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class SupportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //support
        User::create([ //id 3
            'name' => 'Support N1',
            'email' => 'support@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 1
        ]);
        User::create([ //id 4
            'name' => 'Support N2',
            'email' => 'support2@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 1
        ]);
    }
}
