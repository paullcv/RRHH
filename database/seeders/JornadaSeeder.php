<?php

namespace Database\Seeders;

use App\Models\Horario;
use App\Models\Jornada;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JornadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtén los IDs de los horarios
        $primerHorarioId = Horario::where('hora_entrada', '08:30:00')->where('hora_salida', '18:30:00')->first()->id;
        $segundoHorarioId = Horario::where('hora_entrada', '08:30:00')->where('hora_salida', '12:30:00')->first()->id;

        // Primer jornada
        Jornada::create([
            'tipo' => 'Completa',
            'cantidad_horas' => 8,
            'horario_id' => $primerHorarioId,
        ]);

        // Segunda jornada
        Jornada::create([
            'tipo' => 'Media',
            'cantidad_horas' => 4,
            'horario_id' => $segundoHorarioId,
        ]);
    }
}
