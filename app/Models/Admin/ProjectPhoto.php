<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ProjectPhoto extends Model
{
    protected $fillable = [
        'project_id',
        'project_photo',
        'project_photo_caption'
    ];

}
