<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $material = Material::all();
        return $material;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:50',
            'descripcion' => 'required|max:100',
            'tipo_material_id' => 'required'
        ]);

        $material = new Material();
        $material->nombre = $request->get('nombre');
        $material->descripcion = $request->get('descripcion');
        $material->tipo_material_id = $request->get('tipo_material_id');
        $material->save();

        return $material;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nombre' => 'required|max:50',
            'descripcion' => 'required|max:100',
            'tipo_material_id' => 'required'
        ]);
        
        $material = Material::find($id);
        $material->nombre = $request->get('nombre');
        $material->descripcion = $request->get('descripcion');
        $material->tipo_material_id = $request->get('tipo_material_id');
        $material->save();

        return  $material;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $material = Material::find($id);
        if (is_null($material)) {
            return response()->json('No se pudo eliminar. No se encontro el material');
        } else
            $material->delete();
        return ['Eliminado'];
    }
}
