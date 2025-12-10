<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSetting extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_subtitle',
        'hero_button_text',
        'hero_button_link',
        'footer_company',
        'footer_description',
        'footer_email',
        'footer_phone',
        'footer_linkedin',
        'footer_instagram',
        'footer_facebook',
        'footer_x'
    ];
}
