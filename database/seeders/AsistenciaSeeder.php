<?php

namespace Database\Seeders;

use App\Models\Asistencia;
use App\Models\Empleado;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Seeder;

class AsistenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empleados = Empleado::all();
        $fechaFin = new Carbon('2022-12-31');

        foreach ($empleados as $empleado) {

            $horario = $empleado->cargo->jornada->horario;
            $fechaInicio = new Carbon('2022-01-01');

            while ($fechaInicio->lessThan($fechaFin)) {
                $fechaInicio->addDay();
                if ($fechaInicio->dayOfWeek >= Carbon::MONDAY && $fechaInicio->dayOfWeek <= Carbon::FRIDAY) {
                    $horaEntrada = $this->updateHora($horario->hora_entrada);
                    $horaSalida = $this->updateHora($horario->hora_salida);
                    Asistencia::create([
                        'fecha_asistencia' => $fechaInicio,
                        'hora_entrada' => $horaEntrada,
                        'hora_salida' => $horaSalida,
                        'empleado_id' => $empleado->id,
                    ]);
                }
            }
        }
    }
    public function updateHora($hora)
    {
        $datetimeEntrada = new DateTime($hora);
        $minutosASumar = rand(-30, 30);
        $datetimeEntrada->modify($minutosASumar . ' minutes');
        $nuevaHora = $datetimeEntrada->format('H:i:s');
        return $nuevaHora;
    }
}
