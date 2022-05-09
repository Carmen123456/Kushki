<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $datosFalsos=DB::table('Clientes')->where('state','=',false)->
        select(DB::raw('count(*) as falsos'))
        ->first();

        
        $datosVerdad=DB::table('Clientes')->where('state','=',true)->
        select(DB::raw('count(*) as activos'))
        ->first();

        $datosEnter=DB::table('Clientes')->where('categria','=','Enterprise')->
        select(DB::raw('count(*) as Enterprises'))
        ->first();

        $datosMedium=DB::table('Clientes')->where('categria','=','Medium')->
        select(DB::raw('count(*) as Medium'))
        ->first();

        $datosSmall=DB::table('Clientes')->where('categria','=','Small')->
        select(DB::raw('count(*) as Small'))
        ->first();
        //paises 
        $datosColombia=DB::table('Clientes')->where('pais','=','Colombia')->
        select(DB::raw('count(*) as Colombia'))
        ->first(); 
        
        $datosEcuador=DB::table('Clientes')->where('pais','=','Ecuador')->
        select(DB::raw('count(*) as Ecuador'))
        ->first();

        $datosChile=DB::table('Clientes')->where('pais','=','Chile')->
        select(DB::raw('count(*) as Chile'))
        ->first();
        
        $datosPeru=DB::table('Clientes')->where('pais','=','Perú')->
        select(DB::raw('count(*) as Peru'))
        ->first();

        $datosMexico=DB::table('Clientes')->where('pais','=','México')->
        select(DB::raw('count(*) as Mexico'))
        ->first();
        return view('pages.dashboard',  compact('datosFalsos','datosEnter','datosMedium','datosVerdad', 'datosSmall',
        'datosChile','datosEcuador', 'datosColombia','datosPeru','datosMexico' ));
    }
}
