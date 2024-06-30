<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SEO extends Model
{
    use HasFactory;

    protected $fillable = [
        'meta_title',
        'meta_description',
        'keywords',
        'post_id',
    ];

    public function post() : BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
