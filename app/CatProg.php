<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatProg extends Model
{
   protected $table = 'cat_prog'; //
   public $timestamps = false;
   protected $primaryKey = 'cod';
}
