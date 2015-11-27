<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class ApoyosOrdenesController extends Controller
{
	/**
	 * Process datatables ajax request.
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function datos($ide)
	{
		$resultado = DB::table('apoyos_ordenes')
				->join('apoyos', 'apoyos_ordenes.id_apoyo', '=', 'apoyos.id')				
				->select('*')->where('id_orden', '=', $ide)->take(20)->get();

		return \Response::json($resultado);
	}
}
