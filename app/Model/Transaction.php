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
    /**
     * @var mixed
     */
    private $asset_id;
    /**
     * @var mixed
     */
    private $voucher_number;
    /**
     * @var mixed
     */
    private $amount;
    /**
     * @var mixed
     */
    private $voucher_id;
    /**
     * @var mixed
     */
    private $particulars;
    /**
     * @var mixed
     */
    private $user_id;
}
