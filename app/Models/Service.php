<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'icon',
        'short_description',
        'description',
        'is_active',
        'sort_order',
        'order',          // optional: keep if you still use "order" in admin
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // AUTO GENERATE SLUG + default is_active
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->title);
            }
            if (is_null($service->is_active)) {
                $service->is_active = true;
            }
        });
    }
}
