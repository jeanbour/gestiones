<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Gestiones\Repositories\ColoniasRepo;

class DomiciliosController extends Controller
{

    protected $coloniasRepo;

    public function __construct(ColoniasRepo $coloniasRepo)
    {
        $this->coloniasRepo = $coloniasRepo;
    }


    public function colonias($id) {
        
        $colonia = $this->coloniasRepo->find($id);

        return \View::make('apoyos.domicilios', compact('colonia'));
    }
}
