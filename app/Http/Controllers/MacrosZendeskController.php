<?php

namespace App\Http\Controllers;
use App\Models\macrosZendesk;
use Illuminate\Http\Request;
use App\Exports\macrosZendeskExport;
use App\Exports\macrosZendeskB2CExport;
use Maatwebsite\Excel\Facades\Excel;
class MacrosZendeskController extends Controller
{
    public function __construct(){
        $this->middleware('can:Editar mis macros')->only('edit','update');
        $this->middleware('can:Editar mis macros')->only('edit','update');
        $this->middleware('can:Crear mis macros')->only('store, create');
        $this->middleware('can:Eliminar mis macros')->only('destroy');
      
    }
    
    public function index()
    {
        $datosZendesk = macrosZendesk::all()->where('grupo','=',true);

        return view('macros.zendesk.listar',compact('datosZendesk'));
    }

    public function misMacros()
    {   
       
        $datosZendesk = macrosZendesk::where('user_id', auth()->id())->get();
       
            return view('macros.zendesk.misMacros',compact('datosZendesk'));
        
    }   
    
    public function grupobtc()
    {
        $datosZendesk = macrosZendesk::all()->where('grupo','=',false);

        return view('macros.zendesk.listarbtc',compact('datosZendesk'));
    }
    
    public function create()
    {
        return view('macros.zendesk.registrar'); 
    }

    public function store(Request $request)
    {
        $datosZendesk  = new macrosZendesk;
        $datosZendesk->respuesta = $request->input('respuesta');
        $datosZendesk ->nombrePlantilla = $request->input('nombrePlantilla');
        $datosZendesk->aplicativo = $request->input('aplicativo');
        $datosZendesk->fechaActualizacion = $request->input('fechaActualizacion');
        $datosZendesk->grupo = $request->input('grupo');
        $datosZendesk->user_id = auth()->id();

        $datosZendesk->save();
        return redirect('MacrosZendesk/Mismacros');
    }

    public function show(MacrosZendesk $macrosZendesk)
    {
        //
    }
    

    public function edit($idMacroZendesk)
    {
        $datosZendesk=macrosZendesk::findOrFail($idMacroZendesk);
        return view('macros.zendesk.editar', compact('datosZendesk'));
    }

    public function update(Request $request,$idMacroZendesk)
    {
        $datosZendesk = macrosZendesk::find($idMacroZendesk);
        $datosZendesk->respuesta = $request->input('respuesta');
        $datosZendesk ->nombrePlantilla = $request->input('nombrePlantilla');
        $datosZendesk->aplicativo = $request->input('aplicativo');
        $datosZendesk->fechaActualizacion = $request->input('fechaActualizacion');
        $datosZendesk->user_id = auth()->id();

        $datosZendesk->save();
        return redirect('MacrosZendesk/Mismacros');
    }

  
    public function destroy($idMacroZendesk)
    {
        macrosZendesk::destroy($idMacroZendesk);
        return redirect('MacrosZendesk/Mismacros');
    }

    public function cambiar($idMacroZendesk)
    {
        //seleccionar la macron con el  id
        $Macros = macrosZendesk::find($idMacroZendesk);
        switch($Macros->grupo){
                case true:// pasar a grupo b2c
                    $Macros->grupo =false;            
                    break;
                    case false: //pasar a grupo b2b
                        $Macros->grupo= true;
                        break;
      }            
      $Macros->save(); 
      return redirect('MacrosZendesk/Mismacros');
        }

        public function exportar() 
        {
            return Excel::download(new macrosZendeskExport, 'BD_Macros_Zendesk_B2B.xlsx');
        }

        public function exportarB2C() 
        {
            return Excel::download(new macrosZendeskB2CExport, 'BD_Macros_Zendesk_B2C.xlsx');
        }

}
