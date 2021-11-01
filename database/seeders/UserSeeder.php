<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jesús Inchicaque',
            'email' => 'jesus.9314@gmail.com',
            'password' => bcrypt('alienado123')
        ]);
    }
}
