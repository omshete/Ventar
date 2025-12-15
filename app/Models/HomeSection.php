<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSection extends Model
{
    use HasFactory;

    protected $table = 'home_sections';

    protected $fillable = [
        'section_type', 'title', 'description', 'subtitle', 'button_text', 
        'button_url', 'image', 'teaser_cards', 'is_active', 'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'teaser_cards' => 'array',
    ];
}
