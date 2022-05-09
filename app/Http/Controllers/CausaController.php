<?php

namespace App\Http\Controllers;
use App\Imports\CausaImport;
use App\Models\Causa;
use App\Models\Cliente;
use Controllers\ClienteController;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class CausaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosCausa = Causa::all();
        return view('Cliente.inactivos',compact('datosCausa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Causa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
        {
            $datosCausa = request()->except('_token');
            Causa::insert( $datosCausa );
            return redirect()->route('Cliente.inactivos');
    
        }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Causa  $causa
     * @return \Illuminate\Http\Response
     */
    public function show($idCausa)
    {
        // selecionar de la base de daos
        // pasarlo a la vista
       return view('Causa.mostrarInactivos')->with('Causa',Causa::find($idCausa));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Causa  $causa
     * @return \Illuminate\Http\Response
     */
    public function edit($idCausa)
    {
        $datosCausa=Causa::findOrFail($idCausa);
        return view('Causa.editar',compact('datosCausa'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Causa  $causa
     * @return \Illuminate\Http\Response
     */
      public function update(Request $request,$idCausa)
    {
        $datosCausa = request()->except(['_token','_method']);
        Causa::where('idCausa','=',$idCausa)->
        update($datosCausa);

        $datosCausa=Causa::findOrFail($idCausa);
        $datosCausa->save();
        return redirect()->route('Cliente.inactivos'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Causa  $causa
     * @return \Illuminate\Http\Response
     */
    public function destroy($idCausa)
    {
        Causa::destroy($idCausa);
        return redirect()->route('Cliente.inactivos');
    }

    
   public function importarCausa(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new CausaImport,request()->file('file'));
        return back()->with('message','Importación de causas de inactividad completada');
    }

} 
