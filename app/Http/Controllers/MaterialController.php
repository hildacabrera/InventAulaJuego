<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo_Material;
use App\Models\IngresoMaterial;
use App\Models\Material;

class MaterialController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-Material|crear-Material|editar-Material|borrar-Material', ['only' => ['index']]);
        $this->middleware('permission:crear-Material', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-Material', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-Material', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('Materiales.index', [
            'material' => Material::select('material.*', 'tipo_material.nombre as tipo_material_nombre')
                ->join('tipo_material', 'material.tipo_material_id', '=', 'tipo_material.id')
                ->get(),
            'error' => session('error')
        ]);
    }


    public function create()
    {
        return view('Materiales.create', [
            'material' => Material::all(),
            'errors' => session('errors')
        ]);
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

        return redirect('/Materiales');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('Materiales.edit', ['material' => Material::find($id), 'tipo_material' => Tipo_Material::all()]);
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

        return redirect('/Materiales');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function confirmDelete(string $id)
    {
        return view('Materiales.confirmDelete', ['material' => Material::find($id)]);
    }


    public function destroy(string $id)
    {
        $material = Material::find($id);
        $ingreso = IngresoMaterial::select('*')
            ->where('material_id', $id)
            ->get();

        if ($ingreso->count() > 0) {

            return redirect()->action([self::class, 'index'])->with('error', 'No puedes eliminar un material, tienes ingresos asociados en el sistema.');
        } else {



            $material->delete();
            return redirect('/Materiales');
        }
    }
}
