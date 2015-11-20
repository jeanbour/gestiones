<?php 

namespace App\Gestiones\Managers;
use App\Gestiones\Managers;

class RegisterManager extends BaseManager
{
	
	public function getRules()
	{
		$rules = [
			'Name' => 'required',
			'email'		=> 'required|email|unique:users,email',
			'password'		=> 'required|confirmed',			
			'password_confirmation'		=> 'required'		
		];

		return $rules;
	}
}