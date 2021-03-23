<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sede\Sede;
use App\Models\Barrio\Barrio;
use App\Models\Municipio\Municipio;

class SedeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['sedes'] = Sede::paginate(5);
        return view('sede.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barrio = Barrio::all();
        $municipio = Municipio::all();
        return view('sede.create', compact('barrio','municipio'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosSede = request()->except('_token','Enviar');
        //return response()->json($datosSede);
        Sede::insert($datosSede);
        return redirect('sede')->with('mensaje','SedeCrear');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_sede)
    {
        $sede = Sede::findOrFail($id_sede);
        return view('sede.edit',compact('sede'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_sede)
    {
        $datosSede = request()->except('_token','Enviar','_method');
        //return response()->json($datosSede);
        Sede::where('id_sede','=',$id_sede)->update($datosSede);

        
        return redirect('sede')->with('mensaje','SedeModificar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_sede)
    {
        Sede::destroy($id_sede);
        return redirect('sede')->with('mensaje','SedeEliminar');
    }
}
