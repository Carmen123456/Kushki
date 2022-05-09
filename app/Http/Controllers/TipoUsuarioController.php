<?php

namespace App\Http\Controllers;

use App\Models\TipoUsuario;
use Illuminate\Http\Request;

class TipoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosTipoUsuario = TipoUsuario::all( );
        return view('TipoUsuario.listar', compact('datosTipoUsuario'));
    }
 /*  public function index(Request $request)
    {
        if($request->ajax())
        {
            return Cliente::all( )->where('state','=',true);
        }else{
            return view('home');
        }
      
    } */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('TipoUsuario.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosTipoUsuario = request()->except('_token');
        TipoUsuario::insert( $datosTipoUsuario);
        return redirect('TipoUsuario');

         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoUsuario  $tipoUsuario
     * @return \Illuminate\Http\Response
     */
    public function show(TipoUsuario $tipoUsuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoUsuario  $tipoUsuario
     * @return \Illuminate\Http\Response
     */
    public function edit($idTipoUsuario)
    {
        $datosTipoUsuario=TipoUsuario::findOrFail($idTipoUsuario);
        return view('TipoUsuario.edit',compact('datosTipoUsuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoUsuario  $tipoUsuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idTipoUsuario)
    {
        $datosTipoUsuario = request()->except(['_token','_method']);
        TipoUsuario::where('idTipoUsuario','=',$idTipoUsuario)->
        update($datosTipoUsuario);

        $datosTipoUsuario=TipoUsuario::findOrFail($idTipoUsuario);
        $datosTipoUsuario->save();
        return redirect('TipoUsuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoUsuario  $tipoUsuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($idTipoUsuario)
    {
        TipoUsuario::destroy($idTipoUsuario);
        return redirect('TipoUsuario');
    }
    public function habilitar($idTipoUsuario)
    {
        //seleccionar el cliente co id
        $TipoUsuario = TipoUsuario::find($idTipoUsuario);
        switch($TipoUsuario->estado){
                case true:// pasar a estado deshabilitado
                    $TipoUsuario->estado =false;
                    break;
                    case false: //pasar a estado habilitado true
                        $TipoUsuario->estado =true;
                        break;
            }

            $TipoUsuario->save();
            return redirect('TipoUsuario');
        }
    
}
