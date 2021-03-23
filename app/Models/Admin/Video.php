<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'video_youtube',
        'video_caption',
        'video_order'
    ];

}
