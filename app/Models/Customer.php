<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_country',
        'customer_address',
        'customer_state',
        'customer_city',
        'customer_zip',
        'customer_password',
        'customer_token',
        'customer_stauts'
    ];
}
