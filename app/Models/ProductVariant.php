<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{

    protected $table = 'variant_product';
    protected $primaryKey ='id';
    protected $fillable = ['product_id','tipe','variantName'];
    public $timestamps = true;

    public function Tipe()
    {
        return $this->belongsTo(Variant::class,'tipe');
    }
}
