<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'is_published',
        'user_id',
        'category_id',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function category(): HasOne
    {
        return $this->hasOne(Category::class);
    }
}
