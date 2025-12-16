<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    protected $fillable = [
        'page_title',
        'intro_text',
        'email_label',
        'email_value',
        'phone_label',
        'phone_value',
        'send_to_email',
        'is_active',
        'sort_order',
    ];
}
