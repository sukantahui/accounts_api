<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    protected $hidden = [
        'created_at', 'updated_at'
    ];
    /**
     * @var mixed
     */
    private $ledger_type_id;
    /**
     * @var mixed
     */
    private $ledger_name;
}
