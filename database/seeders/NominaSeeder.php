<?php

namespace Database\Seeders;

use App\Models\Empleado;
use App\Models\Nomina;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NominaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empleados = Empleado::all();
        $fechaFin = new Carbon('2022-12-31');

        foreach ($empleados as $empleado) {
            $cargo = $empleado->cargo;
            $fechaInicio = new Carbon('2022-01-01');
            while ($fechaInicio->lessThan($fechaFin)) {
                $fechaInicio->addMonth();
                $salario = $this->Salario($cargo->nombre);
                $deduccionPorc = rand(1, 13);
                $bonificacionPorc = rand(1, 5);

                $bonificacion = $salario * ($bonificacionPorc / 100);
                $deduccion = $salario * ($deduccionPorc / 100);
                $pagoNeto = $salario + $bonificacion - $deduccion;

                Nomina::create([
                    'salario'=>$salario,
                    'bonificacion' => $bonificacionPorc,
                    'deduccion' => $deduccionPorc,
                    'fecha_pago' => $fechaInicio,
                    'pago_neto' => $pagoNeto,
                    'empleado_id' => $empleado->id,
                    'estado_pago' => true
                ]);
            }
        }
    }

    public function Salario($cargo)
    {
        $salarios = [
            'Director Ejecutivo' => [8000, 12000],
            'Director de Operaciones' => [7000, 11000],
            'Director Financiero' => [7000, 11000],
            'Director de Tecnologia' => [7000, 11000],
            'Director de Desarrollo' => [6000, 10000],
            'Gestor de Proyecto' => [5000, 9000],
            'Analista de Negocio' => [4500, 8000],
            'Arquitecto de Software' => [5500, 9500],
            'Diseñador de Interfaz de Usuario' => [4500, 8000],
            'Ingeniero de Software' => [5000, 9000],
            'Desarrollador de Software' => [4000, 8000],
            'Especialista en Documentacion Tecnica' => [4500, 8000],
            'DevOps' => [5000, 9000],
            'Especialista en seguridad Informatica' => [5500, 9500],
            'Gestor de Calidad' => [5500, 9500],
            'Especialista en Control de Calidad' => [5000, 9000],
            'Ingeniero de Pruebas' => [4500, 8000],
            'Reclutador' => [3500, 6000],
            'Director de Recursos Humanos' => [7000, 11000],
            'Especialista en Desarrollo Organizacional' => [5500, 9500],
            'Especialista en Relaciones Laborales' => [5500, 9500],
            'Especialista en Formacion y Desarrollo' => [5000, 9000],
            'Contador' => [4500, 8000],
            'Analista Financiero' => [4500, 8000],
            'Director de Ventas y Marketing' => [7000, 11000],
            'Gerente de cuentas' => [5000, 9000],
            'Especialista en Marketing Digital' => [4500, 8000],
            'Director de Tecnologia de Informacion' => [7000, 11000],
            'Administrador de Sistema' => [5000, 9000],
            'Ingeniero de Redes' => [3500, 5500],
            'Soporte Tecnico' => [4000, 8000],
        ];

        if (array_key_exists($cargo, $salarios)) {
            $rangoSalario = $salarios[$cargo];
            $salario = rand($rangoSalario[0], $rangoSalario[1]);
            return $salario;
        } else {
            return 50000;
        }
    }
}
