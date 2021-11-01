<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{

    protected $table = 'product_category';
    protected $primaryKey ='id';
    protected $fillable = [
        'product_id',
        'category_id'
    ];
    public $timestamps = true;

    public function Category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
