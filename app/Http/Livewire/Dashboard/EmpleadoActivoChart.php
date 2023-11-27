<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Empleado;
use Livewire\Component;

class EmpleadoActivoChart extends Component
{
    public $selectedChartType = 'departamentos'; // Valor predeterminado
    public $departamentos = true;
    public $cargos = false;

    public function render()
    {
        // Actualiza las variables del controlador según la opción seleccionada
        $this->departamentos = ($this->selectedChartType == 'departamentos');
        $this->cargos = ($this->selectedChartType == 'cargos');

        if ($this->departamentos) {
            $results = Empleado::selectRaw('departments.nombre as departamento, COUNT(empleados.id) as total')
                ->join('cargos', 'empleados.cargo_id', '=', 'cargos.id')
                ->join('departments', 'cargos.departamento_id', '=', 'departments.id')
                ->where('empleados.estado', true)
                ->groupBy('departments.id', 'departments.nombre')
                ->get();
            $data = [
                'labels' => $results->pluck('departamento')->toArray(),
                'data' => $results->pluck('total')->toArray(),
            ];
        } else if ($this->cargos) {
            $results = Empleado::selectRaw('cargos.nombre as cargo, COUNT(empleados.id) as total')
                ->join('cargos', 'empleados.cargo_id', '=', 'cargos.id')
                ->where('empleados.estado', true)
                ->groupBy('cargos.id', 'cargos.nombre')
                ->get();
            $data = [
                'labels' => $results->pluck('cargo')->toArray(),
                'data' => $results->pluck('total')->toArray(),
            ];
        } 
        //dd($this->data);
        $this->emitDrawPdv($data);

        return view('livewire.dashboard.empleado-activo-chart', compact('data'));
    }

    public function emitDrawPdv($data)
    {
        $this->emit('drawPdv', $data);
    }
}
