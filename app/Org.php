<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Org extends Model
{
    protected $table = 'org';//
    public $timestamps = false;
    protected $primaryKey = 'cod';	 //
}
