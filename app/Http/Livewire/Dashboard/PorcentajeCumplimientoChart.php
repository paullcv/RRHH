<?php

namespace App\Http\Livewire\Dashboard;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PorcentajeCumplimientoChart extends Component
{

    public function render()
    {
        $result = DB::table('asistencias')
            ->join('empleados', 'asistencias.empleado_id', '=', 'empleados.id')
            ->join('cargos', 'empleados.cargo_id', '=', 'cargos.id')
            ->join('jornadas', 'cargos.jornada_id', '=', 'jornadas.id')
            ->join('horarios', 'jornadas.horario_id', '=', 'horarios.id')
            ->select(
                DB::raw('COUNT(CASE WHEN asistencias.hora_entrada <= horarios.hora_entrada OR asistencias.hora_entrada <= DATE_ADD(horarios.hora_entrada, INTERVAL 15 MINUTE) THEN 1 ELSE null END) as asistencias_puntuales'),
                DB::raw('COUNT(CASE WHEN asistencias.hora_entrada > horarios.hora_entrada AND asistencias.hora_entrada > DATE_ADD(horarios.hora_entrada, INTERVAL 15 MINUTE) THEN 1 ELSE null END) as asistencias_impuntuales')
            )
            ->first();


        $data = [
            'labels' => ['Asistencias Puntuales', 'Asistencias Impuntuales'],
            'data' => [$result->asistencias_puntuales, $result->asistencias_impuntuales],
        ];

        //   "labels" => array:2 [▼
        //     0 => "Asistencias Puntuales"
        //     1 => "Asistencias Impuntuales"
        //   ]
        //   "data" => array:2 [▼
        //     0 => 420
        //     1 => 35200
        //   ]

        $this->emitDraw($data);


        return view('livewire.dashboard.porcentaje-cumplimiento-chart', compact('data'));
    }

    public function emitDraw($data)
    {
        $this->emit('draw', $data);
    }
}
