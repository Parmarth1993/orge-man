<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompletedLeads  extends Model
{

    protected $fillable = [
        'lead_id','franchises','employees_name', 'hours_worked', 'hourly_wage', 'paid_amount', 'invoice_image', 'job_images', 'supplies', 'job_notes'
    ];
}
