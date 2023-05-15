<?php
namespace App\Http\Controllers;

use App\Models\Coche;

class CocheViewController extends Controller
{
    public function index()
    {
        $coches = Coche::all();
        return view('coches.index', compact('coches'));
    }
    
    public function show($id)
{
    $coche = Coche::find($id);
    // Aquí puedes pasar los datos del coche a la vista y mostrar los detalles
    return view('coches.show', ['coche' => $coche]);
}
}


