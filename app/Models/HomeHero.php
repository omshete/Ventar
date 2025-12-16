<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeHero extends Model
{
    protected $fillable = [
        'title',
        'description',
        'button_label',
        'button_link',
        'card1_title',
        'card1_text',
        'card2_title',
        'card2_text',
        'card3_title',
        'card3_text',
        'card4_title',
        'card4_text',
        'is_active',
        'sort_order',
    ];
}
