<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/title', function () {
    return view('welcome');
});

// angular***********************

Route::get('search', function() {
	return View::make('search');
});

Route::get('search/results', function () {
	$name = Input::get('nombre');
	$personas = App\Personas::where('nombre', 'LIKE', '%' . $name . '%')->take(20)->get();
	return Response::json($personas);
});

// Route::get('apoyos-ordenes', function () {
// 	$ide = Input::get('ide');
// 	$apoyos = App\ApoyosOrdenes::where('id_orden', '=', $ide)->take(20)->get();
// 	return Response::json($apoyos);
// });


// *************OBTENCION DE DATOS**************
Route::get('apoyos-ordenes/{ide}', ['as' => 'datos', 'uses' => 'ApoyosOrdenesController@datos']);

Route::get('nuevo-rfc-autocomplete', ['as' => 'nombres', 'uses' => 'NuevoController@nombres']);
//****************************

Route::controller('/apoyos', 'DatatablesController', ['anyData'  => 'datatables.data', 'getIndex' => 'datatables' ]);

Route::get('nuevo', ['as' => 'nuevo', 'uses' => 'NuevoController@getIndex']);

Route::get('apoyos', ['as' => 'apoyos', 'uses' => 'DatatablesController@getIndex']);

Route::post('register', ['as' => 'register', 'uses' => 'NuevoController@register']);

Route::get('colonias/{id}', ['as' => 'colonias', 'uses' => 'DomiciliosController@colonias']);


