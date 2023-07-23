<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Material;
use Illuminate\Http\Request;
use App\Models\IngresoMaterial;
use App\Http\Controllers\Controller;

class IngresoMaterialController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-Ingreso|crear-Ingreso|editar-Ingreso|borrar-Ingreso', ['only' => ['index']]);
        $this->middleware('permission:crear-Ingreso', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-Ingreso', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-Ingreso', ['only' => ['destroy']]);
    }


    public function index()
    {
        return view('Ingresos.index', [
            'ingreso' => IngresoMaterial::select('ingreso.*', 'users.name as nombre_usuario', 'material.nombre as nombre_material')
                ->join('users', 'ingreso.users_id', '=', 'users.id')
                ->join('material', 'ingreso.material_id', '=', 'material.id')
                ->orderBy('id', 'asc')
                ->get()
        ]);
    }


    public function create()
    {
        return view('Ingresos.create', ['users' => User::all()], ['material' => Material::all()], [
            'errors' => session('errors')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'cantidad' => 'required|max:10',
            'fecha_ingreso' => 'required',
            'proveedor' => 'required|max:20',
            'material_id' => 'required',
            'users_id' => 'required'
        ]);

        $ingreso = new IngresoMaterial();
        $ingreso->cantidad = $request->get('cantidad');
        $ingreso->fecha_ingreso = $request->get('fecha_ingreso');
        $ingreso->proveedor = $request->get('proveedor');
        $ingreso->users_id = $request->get('users_id');
        $ingreso->material_id = $request->get('material_id');
        $ingreso->save();

        return redirect('/Ingresos');
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
        return view('Ingresos.edit', ['ingreso' => IngresoMaterial::find($id), 'users' => User::all()], ['material' => Material::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'cantidad' => 'required|max:10',
            'fecha_ingreso' => 'required|max:20',
            'proveedor' => 'required|max:20',
            'material_id' => 'required',
            'users_id' => 'required'
        ]);

        $ingreso = IngresoMaterial::find($id);
        $ingreso->cantidad = $request->get('cantidad');
        $ingreso->fecha_ingreso = $request->get('fecha_ingreso');
        $ingreso->proveedor = $request->get('proveedor');
        $ingreso->users_id = $request->get('users_id');
        $ingreso->material_id = $request->get('material_id');
        $ingreso->save();

        return redirect('/Ingresos');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function confirmDelete(string $id)
    {
        return view('Ingresos.confirmDelete', ['ingreso' => IngresoMaterial::find($id)]);
    }


    public function destroy(string $id)
    {
        $ingreso = IngresoMaterial::find($id);
        $ingreso->delete();
        return redirect('/Ingresos');
    }
}
