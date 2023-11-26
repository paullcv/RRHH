<?php

namespace Database\Seeders;

use App\Models\Cargo;
use App\Models\Requisito;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequisitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Datos de requisitos
        $requisitos = [
            // Requisitos para "Dirección Ejecutiva"
            'Director Ejecutivo' => [
                'conocimientos' => 'Experience in strategic leadership, executive decision-making, team management, and in-depth knowledge of the market and industry.',
                'experiencia' => 'Over 10 years in executive roles, preferably in the same industry.',
            ],
        
            'Director de Operaciones' => [
                'conocimientos' => 'Expertise in operational management, process optimization, logistics, and supply chain.',
                'experiencia' => 'Minimum 8 years of experience in operations and project management roles.',
            ],
        
            'Director Financiero' => [
                'conocimientos' => 'Extensive knowledge in financial accounting, financial analysis, budgets, and tax strategies.',
                'experiencia' => 'Over 10 years in financial roles, preferably with experience in the sector.',
            ],
        
            'Director de Tecnología' => [
                'conocimientos' => 'Experience in technological leadership, product development, innovation, and management of technological infrastructure.',
                'experiencia' => 'Minimum 10 years in technological leadership roles and experience in digital transformation projects.',
            ],
        
            // Requisitos para "Desarrollo de Software"
            'Director de Desarrollo' => [
                'conocimientos' => 'Experience in leading development teams, in-depth knowledge of agile methodologies, and a strategic vision in implementing emerging technologies.',
                'experiencia' => 'Over 10 years in software development, with at least 5 years in leadership roles.',
            ],
        
            'Gestor de Proyecto' => [
                'conocimientos' => 'Mastery of project management methodologies, leadership and communication skills, and technical understanding to coordinate development teams.',
                'experiencia' => 'Minimum 5 years in software development project management.',
            ],
        
            'Analista de Negocio' => [
                'conocimientos' => 'Knowledge in business process analysis, requirements gathering, and effective communication between technical and non-technical teams.',
                'experiencia' => 'Minimum 3 years in business analysis roles and experience in development projects.',
            ],
        
            'Arquitecto de Software' => [
                'conocimientos' => 'Extensive experience in software architecture design, design patterns, and in-depth knowledge of relevant technologies.',
                'experiencia' => 'Minimum 7 years in software architecture roles.',
            ],
        
            'Diseñador de Interfaz de Usuario' => [
                'conocimientos' => 'Skills in UX/UI design, prototyping, and knowledge of the latest trends in interface design.',
                'experiencia' => 'Minimum 4 years in user interface design.',
            ],
        
            'Desarrollador de Software' => [
                'conocimientos' => 'Mastery of relevant programming languages, frameworks, agile methodologies, and good coding practices.',
                'experiencia' => 'Minimum 2 years in software development.',
            ],
        
            'Especialista en Documentación Técnica' => [
                'conocimientos' => 'Skills in technical documentation, creating manuals, and a deep understanding of software products.',
                'experiencia' => 'Minimum 3 years in technical documentation roles.',
            ],
        
            'DevOps' => [
                'conocimientos' => 'Experience in continuous integration, continuous delivery, deployment automation, and system administration.',
                'experiencia' => 'Minimum 5 years in DevOps roles.',
            ],
        
            'Especialista en Seguridad Informática' => [
                'conocimientos' => 'Advanced knowledge in cybersecurity, incident management, penetration testing, and compliance with security regulations.',
                'experiencia' => 'Minimum 6 years in specialized cybersecurity roles.',
            ],
        
            'Gestor de Calidad' => [
                'conocimientos' => 'Experience in implementing and maintaining quality management systems, internal and external audits, and continuous improvement.',
                'experiencia' => 'Over 8 years in quality management.',
            ],
        
            'Especialista en Control de Calidad' => [
                'conocimientos' => 'Knowledge in software testing, test automation, and quality control methodologies.',
                'experiencia' => 'Minimum 5 years in quality control roles.',
            ],
        
            'Ingeniero de Pruebas' => [
                'conocimientos' => 'Experience in designing and executing test cases, automated testing tools, and reporting results.',
                'experiencia' => 'Minimum 3 years in testing engineering.',
            ],
        
            // Requisitos para "Recursos Humanos"
            'Reclutador' => [
                'conocimientos' => 'Experience in recruitment, interviews, candidate evaluation, and knowledge of current trends in talent management.',
                'experiencia' => 'Minimum 2 years in recruitment.',
            ],
        
            'Director de Recursos Humanos' => [
                'conocimientos' => 'In-depth knowledge in human resources management, labor law, organizational development, and labor relations.',
                'experiencia' => 'Over 8 years in human resources roles.',
            ],
        
            'Especialista en Desarrollo Organizacional' => [
                'conocimientos' => 'Experience in designing and implementing organizational development programs, change management, and performance evaluation.',
                'experiencia' => 'Minimum 5 years in organizational development.',
            ],
        
            'Especialista en Relaciones Laborales' => [
                'conocimientos' => 'Knowledge in labor law, labor conflict management, and collective bargaining.',
                'experiencia' => 'Minimum 4 years in labor relations.',
            ],
        
            'Especialista en Formación y Desarrollo' => [
                'conocimientos' => 'Experience in designing and implementing training programs, assessing training needs, and talent development.',
                'experiencia' => 'Minimum 3 years in training and development.',
            ],
        
            // Requisitos para "Finanzas"
            'Director Financiero' => [
                'conocimientos' => 'Extensive knowledge in financial accounting, cost analysis, budgets, and fiscal management.',
                'experiencia' => 'Over 10 years in financial roles, preferably with experience in the sector.',
            ],
        
            'Contador' => [
                'conocimientos' => 'Experience in accounting, auditing, financial reporting, and up-to-date knowledge of accounting regulations.',
                'experiencia' => 'Minimum 5 years as an accountant.',
            ],
        
            'Analista Financiero' => [
                'conocimientos' => 'Skills in financial analysis, financial modeling, and knowledge of financial management tools.',
                'experiencia' => 'Minimum 3 years in financial analysis.',
            ],
        
            // Requisitos para "Ventas y Marketing"
            'Director de Ventas y Marketing' => [
                'conocimientos' => 'Experience in sales strategies, digital marketing, management of sales teams, and market analysis.',
                'experiencia' => 'Over 8 years in sales and marketing roles.',
            ],
        
            'Gerente de Cuentas' => [
                'conocimientos' => 'Skills in account management, negotiation, product knowledge, and understanding customer needs.',
                'experiencia' => 'Minimum 5 years in account management.',
            ],
        
            'Especialista en Marketing Digital' => [
                'conocimientos' => 'Experience in digital marketing strategies, SEO, SEM, social media, and performance metrics analysis.',
                'experiencia' => 'Minimum 4 years in digital marketing.',
            ],
        
            // Requisitos para "Tecnología de Información"
            'Director de Tecnología de Información' => [
                'conocimientos' => 'Experience in technological leadership, management of IT projects, technological infrastructure, and emerging trends.',
                'experiencia' => 'Over 10 years in leadership roles in information technology.',
            ],
        
            'Administrador de Sistema' => [
                'conocimientos' => 'Skills in system administration, server maintenance, virtualization, and cybersecurity.',
                'experiencia' => 'Minimum 5 years in system administration.',
            ],
        
            'Ingeniero de Redes' => [
                'conocimientos' => 'Experience in designing, implementing, and maintaining networks, knowledge of network protocols, and network security.',
                'experiencia' => 'Minimum 6 years in network engineering.',
            ],
        
            'Soporte Técnico' => [
                'conocimientos' => 'Skills in technical support, problem solving, and in-depth knowledge of operating systems and business software.',
                'experiencia' => 'Minimum 3 years in technical support roles.',
            ],
        ];
        

        // Insertar datos en la tabla "requisito"
        foreach ($requisitos as $cargoNombre => $requisito) {
            $cargoId = Cargo::where('nombre', $cargoNombre)->first()->id;

            Requisito::create([
                'conocimientos' => $requisito['conocimientos'],
                'experiencia' => $requisito['experiencia'],
                'cargo_id' => $cargoId,
            ]);
        }

    }
}
