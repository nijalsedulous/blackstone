<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    protected $fillable = ['name','nav_type','url','is_active','sort_order'];
}
