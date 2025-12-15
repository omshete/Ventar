<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSetting extends Model
{
    protected $fillable = [
        'site_title',
        'logo',

        // footer fields
        'footer_company',
        'footer_description',
        'footer_email',
        'footer_phone',
        'footer_address',
        'footer_x',
        'footer_linkedin',
        'footer_facebook',
        'footer_instagram',
        
    ];
}
