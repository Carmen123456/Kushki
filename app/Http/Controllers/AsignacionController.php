<?php

namespace App\Http\Controllers;
use App\Models\Asignacion;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\User;
class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosAsignacion = Asignacion::all();

        return view('Asignacion.listar' ,compact('datosAsignacion'));
    }

    public function miAsignado()
    {   
       
        $datosAsignacion = Asignacion::where('user_id', auth()->id())->get();

        return view('Asignacion.misAsignados',compact('datosAsignacion'));
        
    }   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::where('idTipoUsuarioFK','=','1')->get();
        $Clientes = Cliente::where('categria','=','Enterprise')->get();
        return view('Asignacion.registrar', compact('usuarios', 'Clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosAsignacion  = new Asignacion;
        $datosAsignacion->user_id=$request->input('usuarios');
        $datosAsignacion->cliente_id=$request->input('Clientes');
        $datosAsignacion->Kam = $request->input('Kam');
        $datosAsignacion->categoria = $request->input('categoria');
       // $datosAsignacion->user_id = auth()->id();

        $datosAsignacion->save();
        return redirect('Asignacion');
    }

    public function show($idAsignacion)
    {
            // selecionar de la base de daos
            // pasarlo a la vista
           return view('$Asignacion.mostrar')->with('$Asignacion',$Asignacion::find($idAsignacion));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function edit($idAsignacion)
    {
        $usuarios = User::where('idTipoUsuarioFK','=','1')->get();
        $Clientes = Cliente::where('categria','=','Enterprise')->get();
        $datosAsignacion= Asignacion::findOrFail($idAsignacion);
        return view('Asignacion.editar',compact('usuarios', 'Clientes','datosAsignacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$idAsignacion)
    {
        $datosAsignacion = Asignacion::find($idAsignacion);
        $datosAsignacion->user_id=$request->input('usuarios');
        $datosAsignacion->cliente_id=$request->input('Clientes');
        $datosAsignacion ->Kam = $request->input('Kam');
        $datosAsignacion ->categoria = $request->input('categoria');
       // $datosAsignacion->user_id = auth()->id();

        $datosAsignacion->save();
        return redirect('Asignacion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\asignacion  $asignacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($idAsignacion)
    {
        asignacion::destroy($idAsignacion);
        return redirect('Asignacion');
    }

    public function cambiar($idAsignacion)
    {
        //seleccionar la categoria con el  id
        $Categoria= asignacion::find($idAsignacion);
        switch($Categoria->categoria){
                case 'Enterprise':// pasar a categoria medium
                    $Categoria->categoria ='Medium';
            
                    break;
                    case 'Medium': //pasar a categoria small
                        $Categoria->categoria ='Small';
                        break;

                        case 'Small': //pasar a categoria enterprise
                            $Categoria->categoria ='Enterprise';
                            break;
      }            
      $Categoria->save(); 
      return redirect('Asignacion');
        }
}