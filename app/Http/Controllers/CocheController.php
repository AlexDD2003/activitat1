<?php

namespace App\Http\Controllers;

use App\Models\Coche;
use Illuminate\Http\Request;

class CocheController extends Controller
{
    public function index()
    {
        $coches = Coche::all();
        return response()->json($coches, 200);
    }

    public function show($id)
    {
        $coche = Coche::find($id);
        if($coche){
            return response()->json($coche, 200);
        } else {
            return response()->json(['error' => 'Coche no encontrado'], 404);
        }
    }

    public function store(Request $request)
    {
        $coche = new Coche;
        $coche->marca = $request->marca;
        $coche->modelo = $request->modelo;
        $coche->color = $request->color;
        $coche->precio = $request->precio;
        $coche->save();
        return response()->json($coche, 201);
    }

    public function update(Request $request, $id)
    {
        $coche = Coche::find($id);
        if($coche){
            $coche->marca = $request->marca;
            $coche->modelo = $request->modelo;
            $coche->color = $request->color;
            $coche->precio = $request->precio;
            $coche->save();
            return response()->json($coche, 200);
        } else {
            return response()->json(['error' => 'Coche no encontrado'], 404);
        }
    }

    public function destroy($id)
    {
        $coche = Coche::find($id);
        if($coche){
            $coche->delete();
            return response()->json(null, 204);
        } else {
            return response()->json(['error' => 'Coche no encontrado'], 404);
        }
    }
}
