<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Gestor;
use App\Models\Material;
use App\Models\Prestamo;
use Illuminate\Http\Request;
use App\Models\IngresoMaterial;
use Illuminate\Support\Facades\Auth;


class PrestamoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-Prestamo|crear-Prestamo|editar-Prestamo|borrar-Prestamo',['only'=>['index']]);
        $this->middleware('permission:crear-Prestamo',['only'=>['create','store']]);
        $this->middleware('permission:editar-Prestamo',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-Prestamo',['only'=>['destroy']]);
       }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->name == "admin"){
            $superPantalla = [
                'ListaPrestamoPersonal' => Prestamo::join('material','material.id', '=', 'prestamo.material_id')
                ->select('prestamo.id','material.nombre', 'material.descripcion', 'prestamo.cantidad', 'prestamo.fecha_devolucion')
                ->where('prestamo.id', '0')
                ->get(),
                'ListaUsuarios' => User::all(),
                'ListaMaterial' => Material::all(),
                'ListaGestores' => Gestor::all(),
                'ListaMaterialesStock' => IngresoMaterial::join('material', 'material.id', '=', 'ingreso.material_id')
                ->select('ingreso.id','material.nombre', 'ingreso.fecha_ingreso', 'ingreso.cantidad')
                ->where('material.id', '0')
                ->get(),
                'ValorUsuario' => 0,
                'ValorMaterial' => 0,
                'ValorGestor' => 0
                    ];
        }else{
            $superPantalla = [
                'ListaPrestamoPersonal' => Prestamo::join('material','material.id', '=', 'prestamo.material_id')
                ->select('prestamo.id','material.nombre', 'material.descripcion', 'prestamo.cantidad', 'prestamo.fecha_devolucion')
                ->where('prestamo.id', '0')
                ->get(),
                'ListaUsuarios' => User::all(),
                'ListaMaterial' => Material::all(),
                'ListaGestores' => Gestor::select('gestor.*')
                    ->where('gestor.email', '=', Auth::user()->email)
                    ->get(),
                //'ListaGestores' => Gestor::all(),
                'ListaMaterialesStock' => IngresoMaterial::join('material', 'material.id', '=', 'ingreso.material_id')
                ->select('ingreso.id','material.nombre', 'ingreso.fecha_ingreso', 'ingreso.cantidad')
                ->where('material.id', '0')
                ->get(),
                'ValorUsuario' => 0,
                'ValorMaterial' => 0,
                'ValorGestor' => 0
                    ];
        }
            
        return view('Prestamos.Prestamos',[
            "superPantalla" =>$superPantalla]);
    }


    public function consultarPrestamos(Request $request)
    {
        $usuarioId = $request->input('persona');
        $materialId = $request->input('material');
        $accionId = $request->input('idAccion');
        $devolverId = $request->input('idDevolver');
        $prestarId = $request->input('idPrestar');
        $fechaActual = Carbon::now();
        $fecha0 = Carbon::createFromFormat('Y-m-d', '2000-01-01');

        if ($accionId === 'Devolver') {

            $prestamo = Prestamo::find((int)$devolverId);
            $prestamo->fecha_devolucion = $fechaActual;
            $prestamo->cantidad = 0;
            $prestamo->save();

            $ingreso = IngresoMaterial::where('ingreso.material_id', $prestamo->material_id)->get();
            $ingreso[0]->cantidad = $ingreso[0]->cantidad + 1;
            $ingreso[0]->save();
        }
        else if ($accionId === 'Prestar') {
            $prestamoCantidad = IngresoMaterial::find((int)$prestarId);
            $prestamoCantidad->cantidad = $prestamoCantidad->cantidad - 1;
            $prestamoCantidad->save();

            $gestores = User::all();
            $prestamos = new Prestamo ();
            $prestamos->cantidad = 1;
            $prestamos->fecha_prestamo =$fechaActual;
            $prestamos->fecha_devolucion =$fecha0;
            $prestamos->descripcion = 'prestar';
            $prestamos->material_id = $prestamoCantidad -> material_id;
            $prestamos->users_id = $gestores[0]->id;
            $prestamos->gestor_id = $usuarioId;
            $prestamos->save();
        }
        $superPantalla = [
            'ListaPrestamoPersonal' => Prestamo::join('material','material.id', '=', 'prestamo.material_id')
            ->select('prestamo.id','material.nombre', 'material.descripcion', 'prestamo.cantidad', 'prestamo.fecha_prestamo')
            ->where('prestamo.gestor_id', $usuarioId)
            ->where('prestamo.cantidad', '>', 0)
            ->get(),
            'ListaUsuarios' => User::all(),
            'ListaMaterial' => Material::all(),
            'ListaGestores' => Gestor::all(),
            'ListaMaterialesStock' => IngresoMaterial::join('material', 'material.id', '=', 'ingreso.material_id')
            ->select('ingreso.id','material.nombre', 'ingreso.fecha_ingreso', 'ingreso.cantidad')
            ->where('material.id', $materialId)
            ->where('ingreso.cantidad', '>', 0)
            ->get(),
            'ValorUsuario' => $usuarioId,
            'ValorMaterial' => $materialId,
            'ValorGestor' => $usuarioId
                ];

                return view('Prestamos.Prestamos',[
                    "superPantalla" =>$superPantalla]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}