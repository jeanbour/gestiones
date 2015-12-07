<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use App;
use App\Apoyos;
use App\Gestiones\Managers;
use DB;


class NuevoController extends Controller
{
	    /**
	 * Displays datatables front end view
	 *
	 * @return \Illuminate\View\View
	 */
	public function getIndex()
	{

		$apoyos = Apoyos::lists('apoyo','id');
		// dd($apoyos);
	    return View::make('apoyos/nuevo')->with('apoyos', $apoyos);
	}

	public function Register()
	{
		$personas = new App\Personas();
		$manager = new App\Gestiones\Managers\RegisterManager($personas, \Input::all());
		
	
		if ($manager->save())
		{
			return \Redirect::route('apoyos');
		}

		return \Redirect::back()->withInput()->withErrors($manager->getErrors());	
	}

	public function nombres()
	{
		$nombres = DB::table('personas')->select('*')->get();

		return \Response::json($nombres);
	}
}

	
