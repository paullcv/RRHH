<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Asistencia;
use App\Models\Cargo;
use App\Models\Department;
use App\Models\Empleado;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Carbon\Carbon;

class PorcentajeCumplimientoChart extends Component
{
    protected $listeners = ['clearDateFilters'];
    public $conFiltroDate = false;
    public $conFiltroSelect = false;
    public $start_date;
    public $end_date;
    public $errorMessage = '';
    public $departamentos = null;
    public $departamento_id = null;
    public $cargos = null;
    public $cargo_id = null;
    public $empleados = null;
    public $empleado_id = null;

    protected $rules = [
        'start_date' => 'required|date|before:end_date',
        'end_date' => 'required|date|after:start_date',
        'cargo_id' => 'required_with:departamento_id',
        'empleado_id' => 'required_with:cargo_id',
    ];

    protected $messages = [
        'start_date.required' => 'La Fecha inicio es requerida.',
        'end_date.required' => 'La Fecha fin es requerida.',
        'end_date.after' => 'La Fecha Fin no puede ser menor que la Fecha inicio.',
        'start_date.before' => 'La Fecha Inicio no puede ser mayor que la Fecha Fin.',
        'cargo_id.required_with' => 'Primero debe seleccionar un departamento.',
        'empleado_id.required_with' => 'Primero debe seleccionar un cargo.',
    ];

    public function clearDateFilters()
    {
        $this->start_date = '2022-01-03';
        $this->end_date = '2022-12-30';
        $this->conFiltroDate = false;
        $this->resetValidation();
        $this->render();
    }

    public function clearSelectFilters()
    {
        $this->departamento_id = null;
        $this->cargo_id = null;
        $this->empleado_id = null;
        $this->conFiltroSelect = false;
        $this->resetValidation();
        $this->render();
    }

    public function updated($propertyName)
    {
        if ($this->start_date && $this->end_date) {
            $this->conFiltroDate = true;
            $this->validateOnly($propertyName, $this->rules);
        }

        if ($this->departamento_id || $this->cargo_id || $this->empleado_id) {
            $this->conFiltroSelect = true;
            $this->validateOnly($propertyName, $this->rules);
        }
    }

    public function __construct()
    {
        $this->loadDepartamentos();
        $currentDate = (new Carbon())->format('Y-m-d');
        $this->start_date = '2022-01-03';
        $this->end_date = '2022-12-30';
    }

    public function render()
    {
        $this->loadDepartamentos();
        if ($this->departamento_id && $this->cargo_id && $this->empleado_id) {
            $results = Asistencia::selectRaw("DATE_FORMAT(fecha_asistencia, '%Y-%m-%d') as fecha")
                ->selectRaw('COUNT(CASE WHEN asistencias.hora_entrada <= horarios.hora_entrada OR asistencias.hora_entrada <= DATE_ADD(horarios.hora_entrada, INTERVAL 15 MINUTE) THEN 1 END) as asistencias_puntuales')
                ->selectRaw('COUNT(CASE WHEN asistencias.hora_entrada > horarios.hora_entrada AND asistencias.hora_entrada > DATE_ADD(horarios.hora_entrada, INTERVAL 15 MINUTE) THEN 1 END) as asistencias_impuntuales')
                ->join('empleados', 'asistencias.empleado_id', '=', 'empleados.id')
                ->join('cargos', 'empleados.cargo_id', '=', 'cargos.id')
                ->join('departments', 'cargos.departamento_id', '=', 'departments.id')
                ->join('jornadas', 'cargos.jornada_id', '=', 'jornadas.id')
                ->join('horarios', 'jornadas.horario_id', '=', 'horarios.id')
                ->whereBetween('fecha_asistencia', [$this->start_date, $this->end_date])
                ->where('departments.id', $this->departamento_id)
                ->where('cargos.id', $this->cargo_id)
                ->where('empleados.id', $this->empleado_id)
                ->groupBy('fecha')
                ->get();
        } elseif ($this->departamento_id && $this->cargo_id) {
            $results = Asistencia::selectRaw("DATE_FORMAT(fecha_asistencia, '%Y-%m-%d') as fecha")
                ->selectRaw('COUNT(CASE WHEN asistencias.hora_entrada <= horarios.hora_entrada OR asistencias.hora_entrada <= DATE_ADD(horarios.hora_entrada, INTERVAL 15 MINUTE) THEN 1 END) as asistencias_puntuales')
                ->selectRaw('COUNT(CASE WHEN asistencias.hora_entrada > horarios.hora_entrada AND asistencias.hora_entrada > DATE_ADD(horarios.hora_entrada, INTERVAL 15 MINUTE) THEN 1 END) as asistencias_impuntuales')
                ->join('empleados', 'asistencias.empleado_id', '=', 'empleados.id')
                ->join('cargos', 'empleados.cargo_id', '=', 'cargos.id')
                ->join('departments', 'cargos.departamento_id', '=', 'departments.id')
                ->join('jornadas', 'cargos.jornada_id', '=', 'jornadas.id')
                ->join('horarios', 'jornadas.horario_id', '=', 'horarios.id')
                ->whereBetween('fecha_asistencia', [$this->start_date, $this->end_date])
                ->where('cargos.id', $this->cargo_id)
                ->groupBy('fecha')
                ->get();
        } elseif ($this->departamento_id) {
            $results = Asistencia::selectRaw("DATE_FORMAT(fecha_asistencia, '%Y-%m-%d') as fecha")
                ->selectRaw('COUNT(CASE WHEN asistencias.hora_entrada <= horarios.hora_entrada OR asistencias.hora_entrada <= DATE_ADD(horarios.hora_entrada, INTERVAL 15 MINUTE) THEN 1 END) as asistencias_puntuales')
                ->selectRaw('COUNT(CASE WHEN asistencias.hora_entrada > horarios.hora_entrada AND asistencias.hora_entrada > DATE_ADD(horarios.hora_entrada, INTERVAL 15 MINUTE) THEN 1 END) as asistencias_impuntuales')
                ->join('empleados', 'asistencias.empleado_id', '=', 'empleados.id')
                ->join('cargos', 'empleados.cargo_id', '=', 'cargos.id')
                ->join('departments', 'cargos.departamento_id', '=', 'departments.id')
                ->join('jornadas', 'cargos.jornada_id', '=', 'jornadas.id')
                ->join('horarios', 'jornadas.horario_id', '=', 'horarios.id')
                ->whereBetween('fecha_asistencia', [$this->start_date, $this->end_date])
                ->where('departments.id', $this->departamento_id)
                ->groupBy('fecha')
                ->get();
        } else {
            $results = Asistencia::selectRaw("DATE_FORMAT(fecha_asistencia, '%Y-%m-%d') as fecha")
                ->selectRaw('COUNT(CASE WHEN asistencias.hora_entrada <= horarios.hora_entrada OR asistencias.hora_entrada <= DATE_ADD(horarios.hora_entrada, INTERVAL 15 MINUTE) THEN 1 END) as asistencias_puntuales')
                ->selectRaw('COUNT(CASE WHEN asistencias.hora_entrada > horarios.hora_entrada AND asistencias.hora_entrada > DATE_ADD(horarios.hora_entrada, INTERVAL 15 MINUTE) THEN 1 END) as asistencias_impuntuales')
                ->join('empleados', 'asistencias.empleado_id', '=', 'empleados.id')
                ->join('cargos', 'empleados.cargo_id', '=', 'cargos.id')
                ->join('departments', 'cargos.departamento_id', '=', 'departments.id')
                ->join('jornadas', 'cargos.jornada_id', '=', 'jornadas.id')
                ->join('horarios', 'jornadas.horario_id', '=', 'horarios.id')
                ->whereBetween('fecha_asistencia', [$this->start_date, $this->end_date])
                ->groupBy('fecha')
                ->get();
        }

        $data = [
            'labels' => ['Asistencias Puntuales', 'Asistencias Impuntuales'],
            'data' => [
                $results->sum(function ($item) {
                    return $item['asistencias_puntuales'];
                }),
                $results->sum(function ($item) {
                    return $item['asistencias_impuntuales'];
                }),
            ],
        ];

        // Obtener la cantidad de fechas diferentes
        $cantidadFechasPuntales =  $results->sum(function ($item) {
            return $item['asistencias_puntuales'];
        });
        $cantidadFechasImpuntales =  $results->sum(function ($item) {
            return $item['asistencias_impuntuales'];
        });
        //CALCULO DE PORCENTAJE
        $totalAsistencias = $cantidadFechasPuntales + $cantidadFechasImpuntales;
        $avgFechaPuntual = round(($cantidadFechasPuntales*100) / $totalAsistencias,2);
        $avgFechaImpuntual = round(($cantidadFechasImpuntales*100) / $totalAsistencias,2);

        $this->emitDraw($data);
        return view('livewire.dashboard.porcentaje-cumplimiento-chart', compact('data','totalAsistencias','avgFechaPuntual','avgFechaImpuntual'));
    }

    public function emitDraw($data)
    {
        $this->emit('draw', $data);
    }

    public function loadDepartamentos()
    {
        $this->departamentos = Department::select('id', 'nombre')
            ->orderBy('nombre', 'asc')
            ->get();
        $this->loadCargos();
        $this->loadEmpleados();
    }

    public function loadCargos()
    {
        $this->cargos = Cargo::select('id', 'nombre')
            ->orderBy('nombre', 'asc')
            ->where('departamento_id', $this->departamento_id)
            ->get();
    }

    public function loadEmpleados()
    {
        $this->empleados = Empleado::select('id', 'nombre')
            ->orderBy('nombre', 'asc')
            ->where('cargo_id', $this->cargo_id)
            ->get();
    }
}
