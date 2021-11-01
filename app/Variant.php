<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $table = 'variant';
    protected $primaryKey ='id';
    protected $fillable = ['variantType'];
    public $timestamps = true;
}
