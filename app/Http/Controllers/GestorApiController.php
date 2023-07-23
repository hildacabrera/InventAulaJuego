<?php

namespace App\Http\Controllers;

use App\Models\Gestor;
use Illuminate\Http\Request;

class GestorApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gestor = Gestor::all();
        return $gestor;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required', 'apellido' => 'required'
        ]);

        $gestor = new Gestor();
        $gestor->nombre = $request->get('nombre');
        $gestor->apellido = $request->get('apellido');
        $gestor->email = $request->get('email');
        $gestor->contraseña = $request->get('contraseña');
        $gestor->save();

        return $gestor;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gestor = Gestor::find('$id');
        return $id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nombre' => 'required', 'apellido' => 'required'
        ]);

        $gestor = Gestor::find($id);
        $gestor->nombre = $request->get('nombre');
        $gestor->apellido = $request->get('apellido');
        $gestor->email = $request->get('email');
        $gestor->contraseña = $request->get('contraseña');
        $gestor->save();

        return $gestor;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gestor = Gestor::find($id);
        if (is_null($gestor)) {
            return response()->json('No se pudo eliminar. No se encontro el Gestor');
        } else
            $gestor->delete();
        return ['Eliminado'];
    }
}
