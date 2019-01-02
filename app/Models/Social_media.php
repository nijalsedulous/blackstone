<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social_media extends Model
{
    protected $table = 'social_media';

    protected $fillable = ['name','icon','url'];
}
