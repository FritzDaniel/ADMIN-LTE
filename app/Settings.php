<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{

    protected $table = 'settings';
    protected $primaryKey ='id';
    protected $fillable = [
        'name',
        'value',
        'tipe'
    ];
    public $timestamps = true;
}
