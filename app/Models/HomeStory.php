<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeStory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'paragraph_1',
        'paragraph_2',
        'paragraph_3',
        'side_title',
        'bullet_1',
        'bullet_2',
        'bullet_3',
        'bullet_4',
    ];
}
