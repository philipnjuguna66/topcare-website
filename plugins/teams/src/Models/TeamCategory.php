<?php

namespace Appsorigin\Teams\Models;

use Illuminate\Database\Eloquent\Model;

class TeamCategory extends Model
{
    protected $casts = [
        'extra' => 'json'
    ];
}
