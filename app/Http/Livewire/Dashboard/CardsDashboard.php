<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Cargo;
use App\Models\Department;
use App\Models\Empleado;
use App\Models\Postulante;
use Livewire\Component;

class CardsDashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard.cards-dashboard');
    }

    public function getDepartamentosProperty(){
        return Department::count();
    }

    public function getCargosProperty(){
        return Cargo::count();
    }

    public function getEmpleadosProperty(){
        return Empleado::count();
    }

    public function getPostulantesProperty(){
        return Postulante::count();
    }

}
