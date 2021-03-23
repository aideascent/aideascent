<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'partner_img',
        'partner_link',
    ];
}
