<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;


class Property_contact extends Model
{
   // use SoftDeletes;
   // protected $dates = ['deleted_at'];


    public function property(){
        return $this->belongsTo('App\Models\Property','property_id','id');
    }
}
