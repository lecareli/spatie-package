<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'is_approved',
        'post_id',
        'user_id',
    ];

    public function posts(): HasOne
    {
        return $this->hasOne(Post::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
