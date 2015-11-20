<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use App;
use App\Gestiones\Managers;

class NuevoController extends Controller
{
	    /**
	 * Displays datatables front end view
	 *
	 * @return \Illuminate\View\View
	 */
	public function getIndex()
	{
	    return View::make('apoyos/nuevo');
	}

	public function Register()
	{
		$user = new App\User();
		$manager = new App\Gestiones\Managers\RegisterManager($user, \Input::all());
		
	
		if ($manager->save())
		{
			return \Redirect::route('apoyos');
		}

		return \Redirect::back()->withInput()->withErrors($manager->getErrors());	}
}
