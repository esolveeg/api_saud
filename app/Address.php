<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guarded = [];

    public function phone()
    {
        return $this->hasOne(Phone::class , 'PhSerial' , 'id');
    }
    public function area()
    {
        return $this->belongsTo(Area::class , 'AreaNo' , 'id');
    }
}
