<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['category_id','title','description','image_url'];

    public function category(){
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
}
