<?php

namespace App\Http\Controllers;
use App\Models\macrosIntercom;
use Illuminate\Http\Request;

class MacrosIntercomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosIntercom = macrosIntercom::all()->where('grupo','=',true);

        return view('macros.intercom.listar',compact('datosIntercom'));
    }

    public function misMacros()
    {   
       
        $datosIntercom = macrosIntercom::where('user_id', auth()->id())->get();
       
            return view('macros.intercom.listar',compact('datosIntercom'));
        
    }   
    
    public function grupobtc()
    {
        $datosIntercom = macrosIntercom::all()->where('grupo','=',false);

        return view('macros.intercom.listarbtc',compact('datosIntercom'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('macros.intercom.registrar'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosIntercom  = new macrosIntercom;
        $datosIntercom->mensaje = $request->input('mensaje');
        $datosIntercom ->categoria = $request->input('categoria');
        $datosIntercom->grupo = $request->input('grupo');
        $datosIntercom->user_id = auth()->id();

        $datosIntercom->save();
        return redirect('MacrosIntercom');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MacrosIntercom  $MacrosIntercom
     * @return \Illuminate\Http\Response
     */
    public function show(MacrosIntercom $macrosIntercom)
    {
        //
    }
    
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MacrosIntercom  $MacrosIntercom
     * @return \Illuminate\Http\Response
     */
    public function edit($idMacroIntercom)
    {
        $datosIntercom=macrosIntercom::findOrFail($idMacroIntercom);
        return view('macros.intercom.editar', compact('datosIntercom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MacrosIntercom  $MacrosIntercom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idMacroIntercom)
    {
        $datosIntercom = macrosIntercom::find($idMacroIntercom);;
        $datosIntercom->mensaje = $request->input('mensaje');
        $datosIntercom ->categoria = $request->input('categoria');
        $datosIntercom->grupo = $request->input('grupo');
        $datosIntercom->user_id = auth()->id();

        $datosIntercom->save();
        return redirect('MacrosIntercom');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MacrosIntercom  $MacrosIntercom
     * @return \Illuminate\Http\Response
     */
    public function destroy($idMacroIntercom)
    {
        macrosIntercom::destroy($idMacroIntercom);
        return redirect('MacrosIntercom');
    }

    public function cambiar($idMacroIntercom)
    {
        //seleccionar la macron con el  id
        $Macros = macrosIntercom::find($idMacroIntercom);
        switch($Macros->grupo){
                case true:// pasar a grupo b2c
                    $Macros->grupo =false;
            
                    break;
                    case false: //pasar a grupo b2b
                        $Macros->grupo =true;
                        break;
      }            
      $Macros->save(); 
      return redirect('MacrosIntercom');
        }
}
