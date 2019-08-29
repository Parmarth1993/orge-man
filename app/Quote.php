<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote  extends Model
{

    protected $fillable = [
        'name','email','phone_number','delivery_address','departure_address','date_of_job','service_needed','location','estimate','additional_details', 'alternate_phone',
    ];
}
