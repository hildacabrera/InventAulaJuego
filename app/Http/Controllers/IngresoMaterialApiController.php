<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IngresoMaterial;

class IngresoMaterialApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ingreso = IngresoMaterial::all();
        return $ingreso;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'cantidad' => 'required|max:10|',
            'fecha_ingreso' => 'required|max:20|',
            'proveedor' => 'required|max:20|',
        ]);

        $ingreso = new IngresoMaterial();
        $ingreso->cantidad = $request->get('cantidad');
        $ingreso->fecha_ingreso = $request->get('fecha_ingreso');
        $ingreso->proveedor = $request->get('proveedor');
        $ingreso->users_id = $request->get('users_id');
        $ingreso->material_id = $request->get('material_id');
        $ingreso->save();

        return $ingreso;
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
        $ingreso = IngresoMaterial::find($id);
        $ingreso->cantidad = $request->get('cantidad');
        $ingreso->fecha_ingreso = $request->get('fecha_ingreso');
        $ingreso->proveedor = $request->get('proveedor');
        $ingreso->users_id = $request->get('users_id');
        $ingreso->material_id = $request->get('material_id');
        $ingreso->save();

        return $ingreso;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ingreso = IngresoMaterial::find($id);
        if (is_null($ingreso)) {
            return response()->json('No se pudo eliminar. No se encontro el ingreso de material');
        } else
            $ingreso->delete();
        return ['Eliminado'];
    }
}
