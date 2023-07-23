<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use App\Models\Tipo_Material;

class TipoMaterialApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipo_material = Tipo_Material::all();
        return $tipo_material;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|max:50'
        ]);

        $tipo_material = new Tipo_Material();
        $tipo_material->nombre = $request->get('nombre');
        $tipo_material->save();

        return $tipo_material;
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
            'nombre' => 'required|max:50'
        ]);

        $tipo_material = Tipo_Material::find($id);
        $tipo_material->nombre = $request->get('nombre');
        $tipo_material->save();

        return $tipo_material;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipo_material = Tipo_Material::find($id);
        if (is_null($tipo_material)) {
            return response()->json('No se pudo eliminar.');
        } else
            $tipo_material->delete();
        return ['Eliminado'];
    }
}
