<?php 

namespace App\Gestiones\Repositories;

use App\Colonias;

class ColoniasRepo {

	public function find($id)
	{
		return Colonias::find($id);
	}
}