<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class voucher extends Model
{
    public function transactions()
    {
        return $this->hasMany('App\Model\Transaction','voucher_id');
    }
}
