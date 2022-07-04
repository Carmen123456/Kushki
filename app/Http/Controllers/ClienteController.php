<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Causa;
use Illuminate\Http\Request;

use App\Imports\ClienteImport;
use App\Exports\ClienteExport;
use App\Exports\ClienteInactivosExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
class ClienteController extends Controller
{
    public function __construct(){
        $this->middleware('can:Editar comercios')->only('edit','update');
        $this->middleware('can:Registrar comercios')->only('create', 'store');
        $this->middleware('can:Eliminar comercios')->only('destroy');
        $this->middleware('can:Inactivar comercios')->only('chat','tipoContacto','habilitar');
        $this->middleware('can:Cargar comercios')->only('importar');
        $this->middleware('can:Descargar comercios')->only('exportar','exportarInactivo');
    }
    
    public function index()
    {
        $datosCliente=DB::select(' select Clientes.idCliente, Clientes.nombreRazon, Clientes.nombreConsola, Clientes.nombreZendesk, 
        Clientes.categria, Clientes.taxId, Clientes.idComercio,Clientes.pais, Clientes.state, 
        Clientes.nombreContacto, Clientes.emailContacto, Clientes.merchanturl, Clientes.tipoContacto, 
        Clientes.personaContacto, Clientes.personaEmmail, Clientes.telefonoWeb, Clientes.emailWeb,
        Clientes.chatWeb, Clientes.user_id, Clientes.created_at, Clientes.updated_at, users.name
        from Clientes 
   inner join users  on users.id = Clientes.user_id 
   where clientes.state =true 
   group by idCliente;
');

        return view('Cliente.listar', compact('datosCliente'));
    }
    public function listarInactivos(){

        $datosCliente=DB::select('select Clientes.idCliente, Clientes.nombreRazon, Clientes.nombreConsola, Clientes.nombreZendesk, 
        Clientes.categria, Clientes.taxId, Clientes.idComercio,Clientes.pais, Clientes.state, 
        Clientes.nombreContacto, Clientes.emailContacto, Clientes.merchanturl, Clientes.tipoContacto, 
        Clientes.personaContacto, Clientes.personaEmmail, Clientes.telefonoWeb, Clientes.emailWeb,
        Clientes.chatWeb, Clientes.user_id, Clientes.created_at, Clientes.updated_at, users.name,
        Causa.idCausa , Causa.fecha , Causa.nombreAgente , Causa.ticket, Causa.motivo from Clientes left join Causa 
        on  Clientes.idCliente=Causa.idClienteFK 
        inner join users on users.id = Clientes.user_id 
        where clientes.state =false 
        and Causa.idClienteFK is null 
        group by idCliente');
        return view('Cliente.sinCausa', compact('datosCliente'));
               
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

$datosCausa=DB::select('select * from Clientes left join Causa 
on  Clientes.idCliente=Causa.idClienteFK where clientes.state =false and Causa.idClienteFK is not null');

return view('Cliente.inactivos', compact('datosCausa'));

    }
    public function causa($idCliente)
    { 
        $Cliente=Cliente::findOrFail($idCliente);
        return view('Causa.create', compact('Cliente'));
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
        $datosCliente->personaContacto = $request->input('personaContacto');
        $datosCliente->tipoContacto = $request->input('tipoContacto');
        $datosCliente->personaEmmail = $request->input('personaEmmail');
        $datosCliente->telefonoWeb = $request->input('telefonoWeb');
        $datosCliente->emailWeb = $request->input('emailWeb');
        $datosCliente->chatWeb = $request->input('chatWeb');
        $datosCliente->user_id = auth()->id();

        $datosCliente->save();
        return redirect('Cliente')->with('mensaje','Se creó correctamente');
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
        $datosCliente->tipoContacto = $request->input('tipoContacto');
        $datosCliente->personaEmmail = $request->input('personaEmmail');
        $datosCliente->telefonoWeb = $request->input('telefonoWeb');
        $datosCliente->emailWeb = $request->input('emailWeb');
        $datosCliente->chatWeb = $request->input('chatWeb');
        $datosCliente->user_id = auth()->id();

        $datosCliente->save();
        return redirect('Cliente')->with('mensaje','Se actualizó correctamente');;
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
        return redirect('Cliente')->with('mensaje','Se eliminó correctamente');
    }
    public function habilitar(Request $request)
    {
        //seleccionar el cliente co id
        $datosCliente = Cliente::find( $request->idCliente);
        switch( $datosCliente->state){
                case true:// pasar a estado deshabilitado
                    $datosCliente->state =false;
                    break;
                    case false: //pasar a estado habilitado true
                        $datosCliente->state =true;
                        break;
            }
$datosCliente->save();
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
          return redirect('Cliente')->with('mensaje','Se actualizó el estado del chat web');
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
              return redirect('Cliente')->with('mensaje','Se actualizó el tipo contacto');
                }

                public function importar(Request $request){
                    
                    $file = $request->file('file');
                    
                    Excel::import(new ClienteImport,request()->file('file'));
                    return back()->with('mensaje','Importación de cliente completada');
                   
                   
            }
            public function exportar() 
            {
                return Excel::download(new ClienteExport, 'BD_Clientes_Activos.xlsx');
            }
            public function exportarInactivo() 
            {
                return Excel::download(new ClienteInactivosExport, 'BD_Clientes_Inactivos.xlsx');
            }
               
}
