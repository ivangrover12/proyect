<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoGasto extends Model
{
    protected $table = 'tipogasto';//
    public $timestamps = false;
    protected $primaryKey = 'cod';	 //
}
