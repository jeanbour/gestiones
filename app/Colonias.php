<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colonias extends Model
{
    protected $fillable = array('id', 'num_zona', 'bis', 'colonia');
}
