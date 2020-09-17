<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    /**
     * @var mixed
     */
    private $transaction_date;
    /**
     * @var mixed
     */
    private $ledger_id;
    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
