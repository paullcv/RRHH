<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Postulante;
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
            dd('error');
            return view('microservicioIA.error', ['errorCode' => $errorCode, 'errorMessage' => $errorMessage]);
        }
    }
    public function enviarDatosAPI($id)
    {
        $postulante = Postulante::find($id);
        // Realizar la solicitud a la API
        // dd($postulante);
        $response = Http::post('https://resumeia.onrender.com/api/postulanteIA/', [
            'nombre' => $postulante->name,
            'email' => $postulante->email,
            'resumecv' => 'Im paul cruz, i am a software enginer, my skills are python, sqlite, python, machine learning, nlp, c++',
            'puntuacioncv' => '0.0',
            'job' => 'I am Paul, I am backend developer, the skills nedeed are python, sqlite'
        ]);
        dd($response);

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
