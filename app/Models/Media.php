<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_path',
        'file_type',
        'post_id',
        'user_id',
    ];

    public function posts() : HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function user() : HasOne
    {
        return $this->hasOne(User::class);
    }
}
