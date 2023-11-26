<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Datos de los departamentos
        $departamentos = [
            [
                'nombre' => 'Dirección Ejecutiva',
                'descripcion' => 'Encargada de establecer la visión, misión y estrategias de la empresa, tomando decisiones clave para el éxito a largo plazo.'
            ],
            [
                'nombre' => 'Desarrollo de Software',
                'descripcion' => 'Equipo dedicado a la creación, mejora y mantenimiento de productos y aplicaciones, garantizando innovación y calidad en cada línea de código.'
            ],
            [
                'nombre' => 'Recursos Humanos',
                'descripcion' => 'Responsable de la gestión del talento, reclutamiento, desarrollo profesional y bienestar de los empleados, asegurando un ambiente laboral positivo.'
            ],
            [
                'nombre' => 'Finanzas',
                'descripcion' => 'Encargada de la gestión financiera, presupuestos, contabilidad y análisis de costos para asegurar la estabilidad económica y el crecimiento sostenible.'
            ],
            [
                'nombre' => 'Ventas y Marketing',
                'descripcion' => 'Focalizado en la promoción y venta de productos o servicios, así como en la construcción de relaciones sólidas con los clientes a través de estrategias de marketing efectivas.'
            ],
            [
                'nombre' => 'Tecnología de Información',
                'descripcion' => 'Encargada de la infraestructura tecnológica, seguridad informática y sistemas de información, garantizando la operatividad y eficiencia de los procesos tecnológicos.'
            ],
        ];

        // Insertar datos en la tabla "departamento"
        foreach ($departamentos as $departamento) {
            Department::create($departamento);
        }
    }
}
