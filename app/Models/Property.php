<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    //

    public function property_images(){
        return $this->hasMany('App\Models\Property_image','property_id');
    }

    public function country(){
        return $this->belongsTo('App\Models\Client','country_id','id');
    }
}
