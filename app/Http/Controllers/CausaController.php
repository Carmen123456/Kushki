<?php

namespace App\Http\Controllers;
use App\Imports\CausaImport;
use App\Models\Causa;
use App\Models\Cliente;
use Controllers\ClienteController;
use Illuminate\Http\Request;
use App\Exports\CausaExport;
use Maatwebsite\Excel\Facades\Excel;
class CausaController extends Controller
{
    public function __construct(){
        $this->middleware('can:Editar causas')->only('edit','update');
        $this->middleware('can:Cargar causas')->only('importarCausa');
    }

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
            $datosCausa  = new Causa;
            $datosCausa->fecha=$request->input('fecha');
            $datosCausa->nombreAgente=$request->input('nombreAgente');
            $datosCausa->ticket = $request->input('ticket');
            $datosCausa->motivo  = $request->input('motivo');
            $datosCausa->idClienteFK = $request->input('idClienteFK');
    
    
            $datosCausa->save();

            switch($datosCausa->cliente->state){
                case false:
                    return redirect('Cliente/inactivo');
                    break;
                    case true:
                        return redirect('Cliente');

                        break;
            }
        }
       /*  public function store2(Request $request)
        {
            $datosCausa  = new Causa;
            $datosCausa->fecha=$request->input('fecha');
            $datosCausa->nombreAgente=$request->input('nombreAgente');
            $datosCausa->ticket = $request->input('ticket');
            $datosCausa->motivo  = $request->input('motivo');
            $datosCausa->idClienteFK = $request->input('idClienteFK');
    
    
            $datosCausa->save();
            return redirect()->route('Cliente/inactivo');
        } */


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
        $datosCausa  = Causa::find($idCausa);
        $datosCausa->fecha=$request->input('fecha');
        $datosCausa->nombreAgente=$request->input('nombreAgente');
        $datosCausa->ticket = $request->input('ticket');
        $datosCausa->motivo=$request->input('motivo');
        

        $datosCausa->save();
        return redirect('Cliente/inactivo');
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
        return redirect()->route('Cliente.inactivos')->with('message','Importación de causas de inactividad completada');
    }

    public function exportarCausa() 
    {
        return Excel::download(new CausaExport, 'BD_Causas.xlsx');
    }

} 
