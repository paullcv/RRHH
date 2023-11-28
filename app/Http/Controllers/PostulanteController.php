<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Postulante;
use Illuminate\Http\Request;

class PostulanteController extends Controller
{
    public function index()
    {
        $postulantes = Postulante::all();
        return view('postulantes.index', compact('postulantes'));
    }

    public function create()
    {       
        $cargosDisponibles = Cargo::where('existe_vacante', true)->get();
        return view('postulantes.create', compact('cargosDisponibles'));
    }

    public function store(Request $request)
    {     

        $request->validate([
            'nombre' => 'required',
            'edad' => 'required|integer',
            'telefono' => 'required',
            'email' => 'required|email|unique:postulantes',
            'curriculum' => 'required|mimes:pdf', // Asegura que solo se acepten archivos PDF
            'cargo_id' => 'required|exists:cargos,id',
        ]);
    
        // Guardar el archivo en el servidor
        $archivoCurriculum = $request->file('curriculum');
        $foldername = 'CV';
        $nombreArchivo = time() . '_' . $archivoCurriculum->getClientOriginalName(); // Nombre único para el archivo
        $rutaArchivo = $archivoCurriculum->storeAs($foldername, $nombreArchivo, 'public'); // Cambia 'ruta_deseada' por la ubicación deseada en tu servidor
    
        // Crear el postulante y almacenar el nombre del archivo en el campo 'curriculum'
        $postulante = new Postulante([
            'nombre' => $request->input('nombre'),
            'edad' => $request->input('edad'),
            'telefono' => $request->input('telefono'),
            'email' => $request->input('email'),
            'cargo_id' => $request->input('cargo_id'),
            'curriculum' => $nombreArchivo, // Guarda el nombre del archivo en la base de datos
        ]);
    
        $postulante->save();
    
        return redirect()->route('welcome')->with('success', 'Postulante creado exitosamente');
    
    }

    public function show(Postulante $postulante)
    {
        return view('postulantes.show', compact('postulante'));
    }

    public function edit(Postulante $postulante)
    {
        $cargosDisponibles = Cargo::where('existe_vacante', true)->get();
        return view('postulantes.edit', compact('postulante', 'cargosDisponibles'));
       
    }

    public function update(Request $request, Postulante $postulante)
    {
        $request->validate([
            'nombre' => 'required',
            'edad' => 'required|integer',
            'telefono' => 'required',
            'email' => 'required|email|unique:postulantes,email,' . $postulante->id,
            'curriculum' => 'nullable',
            'cargo_id' => 'required|exists:cargos,id',
        ]);

        $postulante->update($request->all());
        return redirect()->route('postulantes.index')->with('success', 'Postulante actualizado exitosamente');
    }

    public function destroy(Postulante $postulante)
    {
        $postulante->delete();
        return redirect()->route('postulantes.index')->with('success', 'Postulante eliminado exitosamente');
    }
}
