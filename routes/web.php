<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CausaController;
use App\Http\Controllers\IntegrationProjecController;
use App\Http\Controllers\MacrosIntercomController;
use App\Http\Controllers\SupportSlackController;
use App\Http\Controllers\TechSupportController;
use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MacrosZendeskController;


Route::post(
    'DefinirCausa',
    [
        App\Http\Controllers\CausaController::class,
        'store2'
    ]
)->name('Causa.store2')->middleware('auth');

Route::get(
    'User/habilitar',
    [
        App\Http\Controllers\UserController::class,
        'Habilitar'
    ]
)->name('User.habilitar')->middleware('auth');

Route::get(
    'Cliente/habilitar',
    [
        App\Http\Controllers\ClienteController::class,
        'habilitar'
    ]
)->name('Cliente.habilitar')->middleware('auth');

Route::get(
    'Cliente/{Cliente}/chat',
    [
        App\Http\Controllers\ClienteController::class,
        'Chat'
    ]
)->name('Cliente.chat')->middleware('auth');

Route::get(
    'Cliente/{Cliente}/tipoContacto',
    [
        App\Http\Controllers\ClienteController::class,
        'tipoContacto'
    ]
)->name('Cliente.tipoContacto')->middleware('auth');


Route::get(
    'Cliente/inactivo',
    [
        App\Http\Controllers\ClienteController::class,
        'inactivo'
    ]
)->name('Cliente.inactivos')->middleware('auth');

Route::get(
    'Cliente/listarInactivos',
    [
        App\Http\Controllers\ClienteController::class,
        'listarInactivos'
    ]
)->name('Cliente.listarInactivos')->middleware('auth');

Route::get(
    'Cliente/Enterprise',
    [
        App\Http\Controllers\ClienteController::class,
        'enterprise'
    ]
)->name('Cliente.enterprise')->middleware('auth');

Route::get(
    'Cliente/Medium',
    [
        App\Http\Controllers\ClienteController::class,
        'medium'
    ]
)->name('Cliente.medium')->middleware('auth');

Route::get(
    'Cliente/Small',
    [
        App\Http\Controllers\ClienteController::class,
        'listasmall'
    ]
)->name('Cliente.listasmall')->middleware('auth');

Route::get(
    'Cliente/Colombia',
    [
        App\Http\Controllers\ClienteController::class,
        'colombia'
    ]
)->name('Cliente.colombia')->middleware('auth');

Route::get(
    'Cliente/Chile',
    [
        App\Http\Controllers\ClienteController::class,
        'chile'
    ]
)->name('Cliente.chile')->middleware('auth');

Route::get(
    'Cliente/Ecuador',
    [
        App\Http\Controllers\ClienteController::class,
        'ecuador'
    ]
)->name('Cliente.ecuador')->middleware('auth');

Route::get(
    'Cliente/Peru',
    [
        App\Http\Controllers\ClienteController::class,
        'peru'
    ]
)->name('Cliente.peru')->middleware('auth');

Route::get(
    'Cliente/Mexico',
    [
        App\Http\Controllers\ClienteController::class,
        'mexico'
    ]
)->name('Cliente.mexico')->middleware('auth');

Route::get(
    'Cliente/{Cliente}/Causa',
    [
        App\Http\Controllers\ClienteController::class,
        'causa'
    ]
)->name('Cliente.Causa')->middleware('auth');

Route::get(
    'MacrosIntercom/B2C',
    [
        App\Http\Controllers\MacrosIntercomController::class,
        'grupobtc'
    ]
)->name('MacrosIntercom.grupobtc')->middleware('auth');

Route::get(
    'MacrosIntercom/Mismacros',
    [
        App\Http\Controllers\MacrosIntercomController::class,
        'misMacros'
    ]
)->name('MacrosIntercom.misMacros')->middleware('auth');

Route::get(
    'MacrosZendesk',
    [
        App\Http\Controllers\MacrosZendeskController::class,
        'index'
    ]
)->name('MacrosZendesk.index')->middleware('auth');

/**---------------- */

Route::get(
    'MacrosZendesk/B2C',
    [
        App\Http\Controllers\MacrosZendeskController::class,
        'grupobtc'
    ]
)->name('MacrosZendesk.grupobtc')->middleware('auth');

Route::get(
    'MacrosZendesk/Mismacros',
    [
        App\Http\Controllers\MacrosZendeskController::class,
        'misMacros'
    ]
)->name('MacrosZendesk.misMacros')->middleware('auth');


Route::get(
    'Asignacion/MisAsignados',
    [
        App\Http\Controllers\AsignacionController::class,
        'miAsignado'
    ]
)->name('Asignacion.miAsignado')->middleware('auth');

Route::get('Cliente/inactivo/{Cliente}', [ClienteController::class, 'showCausa'])
    ->name('Causa.mostrarInactivos')->middleware('auth');

Route::get('Causa/{Cliente}', [ClienteController::class, 'createCausa'])
    ->name('Causa.create')->middleware('auth');
    Route::resource('Cliente', ClienteController::class)->middleware('auth');
    Route::resource('MacrosIntercom', MacrosIntercomController::class)->middleware('auth');
    Route::resource('Role', RoleController::class)->middleware('auth');
    
Route::post('importar', [ClienteController::class, 'importar'])
->name('Cliente.importar')->middleware('auth');

Route::get('exportar', [ClienteController::class, 'exportar'])
->name('Cliente.exportar')->middleware('auth');

Route::get('exportarInactivos', [ClienteController::class, 'exportarInactivo'])
->name('Cliente.exportarInactivo')->middleware('auth');

Route::get('exportarCausa', [CausaController::class, 'exportarCausa'])
->name('Causa.exportarCausa')->middleware('auth');
/* -----------------*/
Route::get('exportarAsignacion', [AsignacionController::class, 'exportar'])
->name('Asignacion.exportar')->middleware('auth');

Route::get('exportarMacrosIntercom', [MacrosIntercomController::class, 'exportar'])
->name('MacrosIntercom.exportar')->middleware('auth');

Route::get('exportarMacrosIntercomB2B', [MacrosIntercomController::class, 'exportarB2B'])
->name('MacrosIntercom.exportarB2B')->middleware('auth');

Route::get('exportarMacrosZendesk', [MacrosZendeskController::class, 'exportar'])
->name('MacrosZendesk.exportar')->middleware('auth');
Route::get('exportarMacrosZendeskB2C', [MacrosZendeskController::class, 'exportarB2C'])
->name('MacrosZendesk.exportarB2C')->middleware('auth');

Route::get(
    'MacrosIntercom/{MacrosIntercom}/cambiar',
    [
        App\Http\Controllers\MacrosIntercomController::class,
        'cambiar'
    ]
)->name('MacrosIntercom.cambiar')->middleware('auth');

Route::get('/', function () {
    return redirect('dashboard');
})->middleware('auth');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
	Route::resource('User', 'App\Http\Controllers\UserController');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    Route::get('/dashboard', 'App\Http\Controllers\HomeController@index')->name('home');
    Route::resource('Asignacion', AsignacionController::class)->middleware('auth');
    Route::resource('Causas', CausaController::class)->middleware('auth');
    Route::resource('MacrosZendesk', MacrosZendeskController::class)->middleware('auth');
    
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
    Route::get('Cliente', ['as' => 'Cliente.index', 'uses' => 'App\Http\Controllers\ClienteController@index']);
    Route::get('MacrosIntercom', ['as' => 'MacrosIntercom.index', 'uses' => 'App\Http\Controllers\MacrosIntercomController@index']);
    Route::get('Role', ['as' => 'Role.index', 'uses' => 'App\Http\Controllers\RoleController@index']);
    Route::get('MacrosZendesk', ['as' => 'MacrosZendesk.index', 'uses' => 'App\Http\Controllers\MacrosZendeskController@index']);
    Route::get('Asignacion', ['as' => 'Asignacion.index', 'uses' => 'App\Http\Controllers\AsignacionController@index']);
   
});


Route::post('importarCausa', [CausaController::class, 'importarCausa'])->middleware('auth')
->name('Causa.importarCausa');


Route::get(
    'MacrosZendesk/{MacrosZendesk}/cambiar',
    [
        App\Http\Controllers\MacrosZendeskController::class,
        'cambiar'
    ]
)->name('MacrosZendesk.cambiar')->middleware('auth');



Route::PUT(
    'Role/actualizar',
    [
        App\Http\Controllers\RoleController::class,
        'update'
    ]
)->name('Role.actualizar');





Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/dashboard', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

