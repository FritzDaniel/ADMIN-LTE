<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionSequence extends Model
{

    protected $table = 'transaction_sequence';
    protected $primaryKey = 'id';
    protected $fillable = [
        'type',
        'user_id',
        'running_seq'
    ];
    public $timestamps = true;
}
