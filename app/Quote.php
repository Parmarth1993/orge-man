<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote  extends Model
{

    protected $fillable = [
        'name','email','phone_number','delivery_address','departure_address',
    ];
}
