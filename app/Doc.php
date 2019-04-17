<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    protected $table = 'doc';//
    public $timestamps = false;
    protected $primaryKey = 'cod';
}
