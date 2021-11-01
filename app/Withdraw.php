<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $table = 'withdraw';
    protected $primaryKey ='id';
    protected $fillable = [
        'user_id',
        'bank',
        'no_rek',
        'amount',
        'status',
        'buktiTransfer'
    ];
    public $timestamps = true;
}
