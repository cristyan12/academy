<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    /** @var array */
    protected $fillable = [
        'phone',
        'born_at',
        'country',
        'plan_id',
        'user_id',
    ];
}
