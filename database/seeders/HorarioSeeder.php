<?php

namespace Database\Seeders;

use App\Models\Horario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Primer horario
        Horario::create([
            'hora_entrada' => '08:30:00',
            'hora_salida' => '18:30:00',
        ]);

        // Segundo horario
        Horario::create([
            'hora_entrada' => '08:30:00',
            'hora_salida' => '12:30:00',
        ]);
    }
}
