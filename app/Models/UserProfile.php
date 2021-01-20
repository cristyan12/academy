<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    /** @var array */
    protected $casts = [
        'born_at' => 'date'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class)->withDefault();
    }

    public function getDateOfBornAttribute(): bool
    {
        return old('born_at', $this->born_at->format('Y-m-d') ?? '');
    }
}
