<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = 'testimoni';
    protected $primaryKey ='id';
    protected $fillable = [
        'photo',
        'name',
        'age',
        'testimoni',
        'company'
    ];
    public $timestamps = true;

}
