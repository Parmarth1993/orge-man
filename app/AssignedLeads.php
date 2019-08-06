<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedLeads  extends Model
{

    protected $fillable = [
        'sales_id','lead_id','franchises','notes','status'
    ];
}
