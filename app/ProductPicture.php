<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPicture extends Model
{

    protected $table = 'product_picture';
    protected $primaryKey ='id';
    protected $fillable = [
        'product_id',
        'productPicture',
    ];
    public $timestamps = true;
}
