<?php

namespace Database\Seeders;

use App\Models\Cargo;
use App\Models\Department;
use App\Models\Jornada;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener los IDs de departamentos y jornadas
        $departamentoIds = Department::pluck('id')->all();
        $jornadaIds = Jornada::pluck('id')->all();

        // Datos de los cargos
        $cargos = [
            // Cargos para "Dirección Ejecutiva"
            'Dirección Ejecutiva' => [
                ['nombre' => 'Director Ejecutivo', 'cantidad' => 1],
                ['nombre' => 'Director de Operaciones', 'cantidad' => 1],
                ['nombre' => 'Director Financiero', 'cantidad' => 1],
                ['nombre' => 'Director de Tecnologia', 'cantidad' => 1],
            ],

            // Cargos para "Desarrollo de Software"
            'Desarrollo de Software' => [
                ['nombre' => 'Director de Desarrollo', 'cantidad' => 1],
                ['nombre' => 'Gestor de Proyecto', 'cantidad' => 1],
                ['nombre' => 'Analista de Negocio', 'cantidad' => 1],
                ['nombre' => 'Arquitecto de Software', 'cantidad' => 1],
                ['nombre' => 'Diseñador de Interfaz de Usuario', 'cantidad' => 1],
                ['nombre' => 'Ingeniero de Software', 'cantidad' => 1],
                ['nombre' => 'Desarrollador de Software', 'cantidad' => 1],
                ['nombre' => 'Especialista en Documentacion Tecnica', 'cantidad' => 1],
                ['nombre' => 'DevOps', 'cantidad' => 1],
                ['nombre' => 'Especialista en seguridad Informatica', 'cantidad' => 1],
                ['nombre' => 'Gestor de Calidad', 'cantidad' => 1],
                ['nombre' => 'Especialista en Control de Calidad', 'cantidad' => 1],
                ['nombre' => 'Ingeniero de Pruebas', 'cantidad' => 1],
            ],

            // Cargos para "Recursos Humanos"
            'Recursos Humanos' => [
                ['nombre' => 'Reclutador', 'cantidad' => 1],
                ['nombre' => 'Director de Recursos Humanos', 'cantidad' => 1],
                ['nombre' => 'Especialista en Desarrollo Organizacional', 'cantidad' => 1],
                ['nombre' => 'Especialista en Relaciones Laborales', 'cantidad' => 1],
                ['nombre' => 'Especialista en Formacion y Desarrollo', 'cantidad' => 1],
            ],

            // Cargos para "Finanzas"
            'Finanzas' => [
                ['nombre' => 'Director Financiero', 'cantidad' => 1],
                ['nombre' => 'Contador', 'cantidad' => 1],
                ['nombre' => 'Analista Financiero', 'cantidad' => 1],
            ],

            // Cargos para "Ventas y Marketing"
            'Ventas y Marketing' => [
                ['nombre' => 'Director de Ventas y Marketing', 'cantidad' => 1],
                ['nombre' => 'Gerente de cuentas', 'cantidad' => 1],
                ['nombre' => 'Especialista en Marketing Digital', 'cantidad' => 1],
            ],

            // Cargos para "Tecnología de Información"
            'Tecnología de Información' => [
                ['nombre' => 'Director de Tecnologia de Informacion', 'cantidad' => 1],
                ['nombre' => 'Administrador de Sistema', 'cantidad' => 1],
                ['nombre' => 'Ingeniero de Redes', 'cantidad' => 1],
                ['nombre' => 'Soporte Tecnico', 'cantidad' => 1],
            ],
        ];

        // Insertar datos en la tabla "cargo"
        // Insertar datos en la tabla "cargo"
        foreach ($cargos as $departamentoNombre => $listaCargos) {
            $departamentoId = Department::where('nombre', $departamentoNombre)->first()->id;

            foreach ($listaCargos as $cargoData) {
                $cargoData['departamento_id'] = $departamentoId;
                $cargoData['existe_vacante'] = rand(0, 1); // Valor aleatorio true o false
                $cargoData['jornada_id'] = $this->getJornadaIdAleatoria($jornadaIds);

                for ($i = 0; $i < $cargoData['cantidad']; $i++) {
                    Cargo::create([
                        'nombre' => $cargoData['nombre'],
                        'existe_vacante' => $cargoData['existe_vacante'],
                        'departamento_id' => $cargoData['departamento_id'],
                        'jornada_id' => $cargoData['jornada_id'],
                    ]);
                }
            }
        }
    }

    /**
     * Obtiene un ID de jornada de manera aleatoria, favoreciendo el ID 1.
     *
     * @param array $jornadaIds
     * @return int
     */
    private function getJornadaIdAleatoria($jornadaIds)
    {
        // Asegurar que el ID 1 tenga más posibilidades
        $probabilidad = rand(1, 10);
        if ($probabilidad <= 7) {
            return 1; // Jornada de tipo "Completa"
        } else {
            return $jornadaIds[array_rand($jornadaIds)];
        }
    }
}
