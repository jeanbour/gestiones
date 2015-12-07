<?php 

namespace App\Gestiones\Managers;
use App\Gestiones\Managers;

class RegisterManager extends BaseManager
{
	
	public function getRules()
	{
		$rules = [
			// 'Nombre' => 'required',
			// 'Apellido paterno' => 'required',
			// 'email'		=> 'required|email|unique:users,email',
			// 'password'		=> 'required|confirmed',			
			// 'password_confirmation'		=> 'required'			
			'nombre' => 'required',			
	        'apellido_paterno' => 'required',			
	        'apellido_materno' => 'required',			
	        'telefono' => '',			
	        'celular' => 'required_if:telefono,',			
	        // 'calle' => 'required',			
	        // 'numeroI' => 'required',			
	        // 'numeroE' => '',			
	        // 'colonia' => 'required',			
	        // 'seccional' => 'required',			
	        'foto' => 'image',			
	        'apoyo_1' => 'required',			
	        'apoyo_2' => 'required',			
	        'monto_1' => 'required_if:apoyo_1,1',		
	        'monto_2' => 'required_if:apoyo_2,1'		
		];

		return $rules;
	}
}