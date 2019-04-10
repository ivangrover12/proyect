<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Action extends Model
{
    public $timestamps = true;
    public $guarded = ['id'];

    protected $fillable = ['user_id', 'method', 'path', 'data'];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }//
}
