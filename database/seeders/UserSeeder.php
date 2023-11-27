<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'name'=> 'Melanie Daisy Yupanqui Larico',
            'email'=> 'melanie@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Administrador');

        $user2 = User::create([
            'name'=> 'Natalia Quiroga Gutierrez',
            'email'=> 'natalia@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Administrador');

        $user3 = User::create([
            'name'=> 'Paul Cruz Vargas',
            'email'=> 'paul@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Administrador');
    }
}
