<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopPicture extends Model
{

    protected $table = 'shops';
    protected $primaryKey ='id';
    protected $fillable = [
        'shop_id',
        'fotoToko',
        'fotoHeaderToko',
    ];
    public $timestamps = true;
}
