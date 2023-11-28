<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IA_microservicio extends Controller
{
    public function recibirDatosAPI()
    {
        // Realizar la solicitud GET a la API
        $response = Http::get('https://resumeia.onrender.com/api/postulanteIA');


       
        if ($response->successful()) {
            $data = $response->json();
            return view('microservicioIA.index', ['datos' => $data]);
        } else {
            $errorCode = $response->status();
            $errorMessage = $response->body();
            return view('microservicioIA.error', ['errorCode' => $errorCode, 'errorMessage' => $errorMessage]);
        }
    }
    public function enviarDatosAPI($id)
    {
        // Realizar la solicitud a la API
        $response = Http::post('https://resumeia.onrender.com/api/postulanteIA/', [
            'nombre' => 'melanie',
            'email' => 'example@example.com',
            'resumecv' => 'Im paul cruz, i am a software enginer, my skills are python, sqlite, python, machine learning, nlp, c++',
            'puntuacioncv' => '90.9',
            'job' => 'I am Paul, I am backend developer, the skills nedeed are python, sqlite'
        ]);

        if ($response->successful()) {
            $data = $response->json();
            return view('postulante.mostrar', ['respuesta' => $data]);
        } else {
            $errorCode = $response->status();
            $errorMessage = $response->body();
            return view('postulante.error', ['errorCode' => $errorCode, 'errorMessage' => $errorMessage]);
        }
    }
}
