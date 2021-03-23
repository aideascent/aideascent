<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'subcategory_id',
        'slug',
        'description',
        'short_description',
        'photo',
        'seo_title',
        'seo_meta_description'
    ];

}
