<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'schedule_at',
    ];

    protected $casts = [
        'schedule_at' => 'datetime',
    ];

    public function post() : BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
