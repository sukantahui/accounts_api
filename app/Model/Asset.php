<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
