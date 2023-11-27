<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Cargo;
use App\Models\Department;
use App\Models\Empleado;
use Livewire\Component;

class SexoEmpleadoChart extends Component
{
    public $optionDepartamentos = false;
    public $departamentos = [];
    public $departamento_id = null;


    public $optionCargos = false;
    public $cargos = [];
    public $cargo_id = null;

    public $conFiltroSelect = false;

    public function render()
    {
        $this->loadDepartamentos();
        if ($this->optionDepartamentos && $this->departamento_id) {
            $results = Empleado::selectRaw('sexo, COUNT(*) as cantidad')
                ->join('cargos', 'empleados.cargo_id', 'cargos.id')
                ->join('departments', 'cargos.departamento_id', 'departments.id')
                ->where('departments.id', $this->departamento_id)
                ->groupBy('sexo')
                ->get();
        } else if ($this->optionCargos && $this->cargo_id) {
            $results = Empleado::selectRaw('sexo, COUNT(*) as cantidad')
                ->join('cargos', 'empleados.cargo_id', 'cargos.id')
                ->where('cargos.id', $this->cargo_id)
                ->groupBy('sexo')
                ->get();
        } else {
            $results = Empleado::selectRaw('sexo, COUNT(*) as cantidad')
                ->groupBy('sexo')
                ->get();
        }
        $data = [
            'labels' => $results->pluck('sexo')->toArray(),
            'data' => $results->pluck('cantidad')->toArray(),
        ];

        $this->emitDrawGE($data);

        return view('livewire.dashboard.sexo-empleado-chart',compact('data'));
    }

    public function emitDrawGE($data)
    {
        $this->emit('drawGE', $data);
    }

    public function loadDepartamentos()
    {
        $this->departamentos = Department::select('id', 'nombre')
            ->orderBy('nombre', 'asc')
            ->get();
        $this->loadCargos();
    }

    public function loadCargos()
    {
        $this->cargos = Cargo::select('id', 'nombre')
            ->orderBy('nombre', 'asc')
            ->where('departamento_id', $this->departamento_id)
            ->get();
    }

    public function selectDepartamento($departamento_id)
    {
        $this->conFiltroSelect = true;
        $this->departamento_id = $departamento_id;
        $this->optionDepartamentos = true;
        $this->optionCargos = false;
        $this->loadCargos();
    }

    public function selectCargo($cargo_id)
    {
        $this->conFiltroSelect = true;
        $this->cargo_id = $cargo_id;
        $this->optionCargos = true;
        $this->optionDepartamentos = false;
    }

    public function clearSelectFilters(){
        $this->conFiltroSelect = false;
        $this->optionDepartamentos = false;
        $this->departamento_id = null;
        $this->optionCargos = false;
        $this->cargo_id = null;
        $this->resetValidation();
        $this->render();

    }

}
