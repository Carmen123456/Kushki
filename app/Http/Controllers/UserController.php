<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function __construct(){
        $this->middleware('can:Mirar usuarios')->only('index');
        $this->middleware('can:Inactivar usuario')->only('habilitar');
        $this->middleware('can:Borrar usuario')->only('destroy');

    }
    public function index(User $model)
    {
        $tipoUsu = Role::all();
        $datosUser = User::all();
        return view('users.index', ['users' => $model->paginate(5)], compact('datosUser','tipoUsu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosUser = request()->except('_token');
        User::insert( $datosUser); 
        $datosUser->roles()->sync()->withDefault(1);
        
        return redirect('User');

         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $tipoUser
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $tipoUser
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datosUser=User::findOrFail($id);
        $tipoUsu = Role::all();
        return view('users.editar',compact('datosUser','tipoUsu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $tipoUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) 
    {
        $datosUser = User::find($id)->roles()->sync($request->tipoUsu);

        return redirect('User');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $tipoUser
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('User');
    }
    public function habilitar(Request $request)
    {
        //seleccionar el cliente co id
        $User = User::find( $request->id);
        switch( $User->estadoUsuario){
                case true:// pasar a estado deshabilitado
                    $User->estadoUsuario =false;
                    break;
                    case false: //pasar a estado habilitado true
                        $User->estadoUsuario =true;
                        break;
            }
$User->save();
        }
    
}


