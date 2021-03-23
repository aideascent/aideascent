<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class PageContactItem extends Model
{
    protected $fillable = [
        'name',
        'content',
        'status',
        'contact_address',
        'contact_email',
        'contact_phone',
        'seo_title',
        'seo_meta_description'
    ];

}
