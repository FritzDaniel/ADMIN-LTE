<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $table = 'payments';
    protected $primaryKey ='id';
    protected $fillable = [
        'xendit_id',
        'external_id',
        'uniq_code',
        'user_id',
        'payment_channel',
        'email',
        'price',
        'status',
        'description'
    ];
    public $timestamps = true;

    public function User()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function Transaction()
    {
        return $this->hasMany(Transaction::class,'payment_id','id')->with('Product');
    }
}
