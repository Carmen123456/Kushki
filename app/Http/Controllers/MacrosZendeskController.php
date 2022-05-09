<?php

namespace App\Http\Controllers;
use App\Models\macrosZendesk;
use App\Models\Causa;
use Illuminate\Http\Request;

class MacrosZendeskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
    $datosZendesk = macrosZendesk::all()->where('grupo','=',true);

    return view('macros.zendesk.listar',compact('datosZendesk'));
    }
    public function misMacros()
    {   
       
        $datosZendesk = macrosZendesk::where('user_id', auth()->id())->get();

        return view('macros.zendesk.listar',compact('datosZendesk'));
        
    }   
    
    public function grupobtc()
    {
        $datosZendesk = macrosZendesk::all()->where('grupo','=',false);

        return view('macros.zendesk.listarbtc',compact('datosZendesk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('macros.zendesk.registrar'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosZendesk  = new MacrosZendesk;
        $datosZendesk->respuesta = $request->input('respuesta');
        $datosZendesk ->nombrePlantilla = $request->input('nombrePlantilla');
        $datosZendesk->aplicativo = $request->input('aplicativo');
        $datosZendesk->fechaActualizacion = $request->input('fechaActualizacion');
        $datosZendesk->grupo = $request->input('grupo');
        $datosZendesk->user_id = auth()->id();

        $datosZendesk->save();
        return redirect('MacrosZendesk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MacrosZendesk  $MacrosZendesk
     * @return \Illuminate\Http\Response
     */
    public function show(MacrosZendesk $macrosZendesk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MacrosZendesk  $MacrosZendesk
     * @return \Illuminate\Http\Response
     */
    public function edit($idMacroZendesk)
    {
        $datosZendesk=macrosZendesk::findOrFail($idMacroZendesk);
        return view('macros.zendesk.editar', compact('datosZendesk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MacrosZendesk  $MacrosZendesk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idMacroZendesk)
    {
        $datosZendesk = macrosZendesk::find($idMacroZendesk);
        $datosZendesk->respuesta = $request->input('respuesta');
        $datosZendesk ->nombrePlantilla = $request->input('nombrePlantilla');
        $datosZendesk->aplicativo = $request->input('aplicativo');
        $datosZendesk->fechaActualizacion = $request->input('fechaActualizacion');
        $datosZendesk->user_id = auth()->id();

        $datosZendesk->save();
        return redirect('MacrosZendesk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MacrosZendesk  $MacrosZendesk
     * @return \Illuminate\Http\Response
     */
    public function destroy($idMacroZendesk)
    {
        macrosZendesk::destroy($idMacroZendesk);
        return redirect('MacrosZendesk');
    }

    public function cambiar($idMacroZendesk)
    {
        //seleccionar la macro con id
        $Macros = macrosZendesk::find($idMacroZendesk);
        switch($Macros->grupo){
                case true:// pasar a grupo b2c
                    $Macros->grupo =false;
            
                    break;
                    case false: // pasar a grupo b2b
                        $Macros->grupo =true;
                        break;
      }            
      $Macros->save(); 
      return redirect('MacrosZendesk');
        }
}