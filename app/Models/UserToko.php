<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserToko extends Model
{

    protected $table = 'user_toko';
    protected $primaryKey ='id';
    protected $fillable = [
        'user_id',
        'transaction_id',
        'tokoCount',
        'marketplaceCount',
        'marketplaceSelect',
    ];
    public $timestamps = true;
}
