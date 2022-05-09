<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Causa;
use Illuminate\Http\Request;

use App\Imports\ClienteImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $datosCliente = Cliente::all( )->where('state','=',true);

        return view('Cliente.listar', compact('datosCliente'));
    }
    public function listarInactivos(){

        $datosCliente=DB::select('
        select * from Clientes left join Causa 
          on  Clientes.idCliente=Causa.idClienteFK where clientes.state =false and Causa.idClienteFK is null');
        return view('Cliente.listar', compact('datosCliente'));
               
            }
            public function small(){

                $datosSmall = Cliente::all( )->where('categria','=','Small');
        
                return view('Cliente.listar', compact('datosSmall'));
                       
                    }
                
                    public function medium(){

                        $datosCliente = Cliente::all( )->where('categria','=','Medium');
                
                        return view('Cliente.listar', compact('datosCliente'));
                               
                            }
                            public function enterprise(){

                                $datosCliente = Cliente::all( )->where('categria','=','Enterprise');
                        
                                return view('Cliente.listar', compact('datosCliente'));
                                       
                                    }
                                    public function listasmall(){

                                        $datosCliente = Cliente::all( )->where('categria','=','Small');
                                
                                        return view('Cliente.listar', compact('datosCliente'));
                                               
                                            }
                                            public function colombia(){

                                                $datosCliente = Cliente::all( )->where('pais','=','Colombia');
                                        
                                                return view('Cliente.listar', compact('datosCliente'));
                                                       
                                                    }
                                                    public function chile(){

                                                        $datosCliente = Cliente::all( )->where('pais','=','Chile');
                                                
                                                        return view('Cliente.listar', compact('datosCliente'));
                                                               
                                                            }
                                                            public function ecuador(){

                                                                $datosCliente = Cliente::all( )->where('pais','=','Ecuador');
                                                        
                                                                return view('Cliente.listar', compact('datosCliente'));
                                                                       
                                                                    }
                                                                    public function peru(){

                                                                        $datosCliente = Cliente::all( )->where('pais','=','Perú');
                                                                
                                                                        return view('Cliente.listar', compact('datosCliente'));
                                                                               
                                                                            }
                                                                            public function mexico(){

                                                                                $datosCliente = Cliente::all( )->where('pais','=','México');
                                                                        
                                                                                return view('Cliente.listar', compact('datosCliente'));
                                                                                       
                                                                                    }
                                
                
        
    public function inactivo(){

$datosCausa = Causa::all( );
return view('Cliente.inactivos', compact('datosCausa'));
       
    }
    public function causa($idCliente)
    { 
        $datosCliente=Cliente::findOrFail($idCliente);
        return view('Causa.create', compact('datosCliente'));
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cliente.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $datosCliente = new Cliente;
        $datosCliente->nombreRazon = $request->input('nombreRazon');
        $datosCliente->nombreConsola = $request->input('nombreConsola');
        $datosCliente->nombreZendesk = $request->input('nombreZendesk');
        $datosCliente->categria = $request->input('categria');
        $datosCliente->taxId = $request->input('taxId') ;
        $datosCliente->idComercio = $request->input('idComercio');
        $datosCliente->pais = $request->input('pais');
        $datosCliente->nombreContacto = $request->input('nombreContacto');
        $datosCliente->emailContacto = $request->input('emailContacto');
        $datosCliente->merchanturl = $request->input('merchanturl');
        $datosCliente->personaContacto = $request->input('personaContacto') ;
        $datosCliente->personaEmmail = $request->input('personaEmmail');
        $datosCliente->telefonoWeb = $request->input('telefonoWeb');
        $datosCliente->emailWeb = $request->input('emailWeb');
        $datosCliente->chatWeb = $request->input('chatWeb');
        $datosCliente->user_id = auth()->id();

        $datosCliente->save();
        return redirect('Cliente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($idCliente)
    {
            // selecionar de la base de daos
            // pasarlo a la vista
           return view('Cliente.mostrar')->with('Cliente',Cliente::find($idCliente));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($idCliente)
    {
        $datosCliente=Cliente::findOrFail($idCliente);
        return view('Cliente.editar', compact('datosCliente'));
    }

    /**
     * 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idCliente)
    {
        $datosCliente = Cliente::find($idCliente);
        $datosCliente->nombreRazon = $request->input('nombreRazon');
        $datosCliente->nombreConsola = $request->input('nombreConsola');
        $datosCliente->nombreZendesk = $request->input('nombreZendesk');
        $datosCliente->categria = $request->input('categria');
        $datosCliente->taxId = $request->input('taxId') ;
        $datosCliente->idComercio = $request->input('idComercio');
        $datosCliente->pais = $request->input('pais');
        $datosCliente->nombreContacto = $request->input('nombreContacto');
        $datosCliente->emailContacto = $request->input('emailContacto');
        $datosCliente->merchanturl = $request->input('merchanturl');
        $datosCliente->personaContacto = $request->input('personaContacto') ;
        $datosCliente->personaEmmail = $request->input('personaEmmail');
        $datosCliente->telefonoWeb = $request->input('telefonoWeb');
        $datosCliente->emailWeb = $request->input('emailWeb');
        $datosCliente->chatWeb = $request->input('chatWeb');
        $datosCliente->user_id = auth()->id();

        $datosCliente->save();
        return redirect('Cliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($idCliente)
    {
        Cliente::destroy($idCliente);
        return redirect('Cliente');
    }
    public function habilitar($idCliente)
    {
        //seleccionar el cliente co id
        $Cliente = Cliente::find($idCliente);
        switch($Cliente->state){
                case true:// pasar a estado deshabilitado
                    $Cliente->state =false;
                    break;
                    case false: //pasar a estado habilitado true
                        $Cliente->state =true;
                        break;
      }            
            $Cliente->save();
            switch($Cliente->state){
                case false:
                    return redirect()->route('Cliente.Causa',$Cliente->idCliente);
                    break;
                    case true:
                         return redirect('Cliente');

                        break;
            }
           
        }
        public function chat($idCliente)
        {
            //seleccionar el cliente co id
            $Cliente = Cliente::find($idCliente);
            switch($Cliente->chatWeb){
                    case true:// pasar a estado deshabilitado
                        $Cliente->chatWeb =false;
                
                        break;
                        case false: //pasar a estado habilitado true
                            $Cliente->chatWeb =true;
                            break;
          }            
          $Cliente->save(); 
          return redirect('Cliente');
            }
            public function  tipoContacto($idCliente)
            {
                //seleccionar el cliente co id
                $Cliente = Cliente::find($idCliente);
                switch($Cliente->tipoContacto){
                    case null: //pasar a estado habilitado
                        $Cliente->tipoContacto= 'Mail';
    
                        break;
                        case 'Mail':// pasar a estado Slack
                            $Cliente->tipoContacto ='Slack';
                    
                            break;
                            case 'Slack': //pasar a estado Mail true
                                $Cliente->tipoContacto ='Mail';
                                break;
              }            
              $Cliente->save(); 
              return redirect('Cliente');
                }

                public function importar(Request $request){
                    
                    $file = $request->file('file');
                    
                    Excel::import(new ClienteImport,request()->file('file'));
                    return back()->with('message','Importación de cliente completada');
                   
                   
            }
}
