<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $table = 'tbl_transaction';
    protected $primaryKey = 'transaction_id';
}
