<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shops extends Model
{

    protected $table = 'shops';
    protected $primaryKey ='id';
    protected $fillable = [
        'user_id',
        'emailToko',
        'handphoneToko',
        'namaToko',
        'alamatToko',
        'kategoriToko',
        'supplier',
        'design',
        'descToko',
        'status'
    ];
    public $timestamps = true;

    public function userDetail()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function Supplier()
    {
        return $this->belongsTo(User::class,'supplier');
    }

    public function Design()
    {
        return $this->belongsTo(Design::class,'design');
    }

    public function kategoryToko()
    {
        return $this->belongsTo(Category::class,'kategoriToko');
    }
}
