<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partidas extends Model
{
    protected $table = 'partidas';//
    public $timestamps = false;
    protected $primaryKey = 'cod';	
}
