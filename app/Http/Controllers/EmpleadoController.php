<?php

namespace App\Http\Controllers;

use App\Models\Empleado\Empleado;
use App\Models\Empleado\Rol;
use App\Models\Sede\Sede;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //variable que va a usar el modelo para tomar los datos de la base de datos y pasarlos an index
        $datos['empleados'] = Empleado::paginate(7);
        return view('empleado.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sede = Sede::all();
        $rol = Rol::all();
        return view('empleado.create', compact('sede','rol'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$datosEmpleado = request()->all();
        $datosEmpleado = request()->except('_token','Enviar');
        Empleado::insert($datosEmpleado);
        //return response()->json($datosEmpleado);
        return redirect('empleado')->with('mensaje','EmpleadoCrear');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($documento)
    {
        $empleado = Empleado::findOrFail($documento);
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $documento)
    {
        $datosEmpleado = request()->except('_token','Enviar','_method');
        Empleado::where('documento','=',$documento)->update($datosEmpleado);

        
        return redirect('empleado')->with('mensaje','EmpleadoModificar');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($documento)
    {
        Empleado::destroy($documento);
        return redirect('empleado')->with('mensaje','EmpleadoEliminar');
    }
}
