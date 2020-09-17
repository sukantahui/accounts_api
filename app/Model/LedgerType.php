<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LedgerType extends Model
{
    public function ledgers()
    {
        return $this->hasMany('App\Model\Ledger','ledger_type_id');
    }
}
