<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    // default table name will be "team_members" (snake_case plural)
    // if your table is named differently, change it here:
    protected $table = 'team_members';

    protected $fillable = [
        'name',
        'position',
        'photo',
        'about',
    ];
}
