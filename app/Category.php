<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'category';
    protected $primaryKey ='id';
    protected $fillable = [
        'name',
        'logo'
    ];
    public $timestamps = true;
}