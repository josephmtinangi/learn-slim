<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'description', 'starts_at', 'ends_at', 'income_expected', 'income_gained', 'user_id'];

    protected $dates = ['starts_at', 'ends_at'];
}