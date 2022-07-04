<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\roles_permission;
use Spatie\Permission\Models\Permission;
class RoleController extends Controller
{
    public function __construct(){
 
    }
    public function index()
    {
        $Roles= Role::all();
        $permissions = Permission::all();
        $Roles->load('permissions');

        return view('Role.listar', compact('Roles', 'permissions'));
    }

    public function create()
    {

       $permiso = Permission::all();
        return view('Role.create', compact('permiso'));

    }

    public function store(Request $request)
    {
   
        
        $role = Role::create($request->all());
        $role->permissions()->sync($request->permissions);

        return redirect('Role');

         
    }

    
    public function show(Role $Role)
    {
        //
    }


    public function edit($id)
    {
        $role= Role::findOrFail($id);
        $permissions = Permission::all();
        $role->load('permissions');
  
        return response()->json($role);
    }

   
    public function update(Request $request)
    {

            $datosRole=Role::findOrFail($request->id);
            $datosRole->update($request->all());
            $datosRole->permissions()->sync($request->permissions);
     
             $datosRole->save();
             return response()->json($datosRole);
       
    }
    
}
