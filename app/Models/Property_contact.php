<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property_contact extends Model
{
    //


    public function property(){
        return $this->belongsTo('App\Models\Property','property_id','id');
    }
}
