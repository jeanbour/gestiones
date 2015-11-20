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

Route::get('/search', function() {
	return view('search');
});

Route::get('/results', function () {
	$name = Input::get('nombre');
	$users = App\User::where('name', 'LIKE', '%' . $name . '%')->take(20)->get();
	return Response::json($users);
});
//****************************

Route::controller('/nuevo', 'NuevoController', [
    'getIndex' => 'nuevo',
]);

Route::controller('/apoyos', 'DatatablesController', [
    'anyData'  => 'datatables.data',
    'getIndex' => 'datatables',
]);

Route::post('register', ['as' => 'register', 'uses' => 'NuevoController@register']);




