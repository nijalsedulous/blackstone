<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'our_clients';
    protected $fillable = ['name','slug_name','country_flag','description'];
}
