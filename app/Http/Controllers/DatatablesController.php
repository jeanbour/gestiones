<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables;
use App\Personas;
use View;
use DB;

class DatatablesController extends Controller
{
	    /**
	 * Displays datatables front end view
	 *
	 * @return \Illuminate\View\View
	 */
	public function getIndex()
	{
	    return view('apoyos.apoyos');
	}

	/**
	 * Process datatables ajax request.
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function anyData()
	{
		$tabla = DB::table('personas')
				->join('domicilios', 'personas.id_domicilio', '=', 'domicilios.id')
				->join('ordenes', 'personas.id', '=', 'ordenes.id_persona')
				// ->join('apoyos_ordenes', 'ordenes.id', '=', 'apoyos_ordenes.id_orden')
				// ->join('apoyos', 'apoyos_ordenes.id_apoyo', '=', 'apoyos.id')
				// ->join('tipos_apoyos', 'apoyos.id_tipo_apoyo', '=', 'tipos_apoyos.id')
				->select('*');
	    return Datatables::of($tabla)->make(true);
	}
}
