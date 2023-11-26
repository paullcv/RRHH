<?php

namespace Database\Factories;

use App\Models\Cargo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public $cargoQuantities = [
        'Director Ejecutivo' => 1,
        'Director de Operaciones' => 1,
        'Director Financiero' => 1,
        'Director de Tecnologia' => 1,
        'Director de Desarrollo' => 1,
        'Gestor de Proyecto' => 3,
        'Analista de Negocio' => 6,
        'Arquitecto de Software' => 6,
        'Diseñador de Interfaz de Usuario' => 9,
        'Ingeniero de Software' => 6,
        'Desarrollador de Software' => 40,
        'Especialista en Documentacion Tecnica' => 6,
        'DevOps' => 6,
        'Especialista en seguridad Informatica' => 3,
        'Gestor de Calidad' => 1,
        'Especialista en Control de Calidad' => 3,
        'Ingeniero de Pruebas' => 10,
        'Reclutador' => 1,
        'Director de Recursos Humanos' => 1,
        'Especialista en Desarrollo Organizacional' => 1,
        'Especialista en Relaciones Laborales' => 1,
        'Especialista en Formacion y Desarrollo' => 1,
        'Contador' => 3,
        'Analista Financiero' => 3,
        'Director de Ventas y Marketing' => 1,
        'Gerente de cuentas' => 4,
        'Especialista en Marketing Digital' => 5,
        'Director de Tecnologia de Informacion' => 1,
        'Administrador de Sistema' => 2,
        'Ingeniero de Redes' => 3,
        'Soporte Tecnico' => 5,
    ];
    
    public function definition(): array
    {
        $cargo = $this->getNextCargo();
        $usuario = $this->getUniqueUser();

        return [
            'nombre' => $usuario->name,
            'ci' => $this->faker->randomNumber(7), // Formato especificado
            'sexo' => $this->faker->randomElement(['Femenino', 'Masculino']),
            'fecha_nacimiento' => $this->faker->dateTimeBetween('1980-01-01', '2000-12-31')->format('Y-m-d'),
            'telefono' => $this->faker->phoneNumber,
            'direccion' => $this->faker->address,
            'estado' => $this->faker->boolean(90), // 80% de probabilidad de true
            'cargo_id' => $cargo->id,
            'user_id' => $usuario->id,
        ];
    }

    /**
     * Obtén el siguiente cargo en orden según la cantidad especificada.
     *
     * @return \App\Models\Cargo
     */
    private function getNextCargo()
    {
        

        foreach ($this->cargoQuantities as $cargoNombre => $cantidad) {
            $cargo = Cargo::where('nombre', $cargoNombre)->first();

            if ($cargo) {
                if ($cantidad > 0) {
                    $this->cargoQuantities[$cargoNombre] -= 1;
                    return $cargo;
                }
            }
        }

        // En caso de que algo falle, devuelve un cargo aleatorio
        return Cargo::inRandomOrder()->first();
    }

    /**
     * Obtén un usuario que aún no ha sido asignado a un empleado.
     *
     * @return \App\Models\User
     */
    private function getUniqueUser()
    {
        $usuariosDisponibles = User::doesntHave('empleado')->get();

        return $usuariosDisponibles->random();
    }
}
