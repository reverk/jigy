<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'category_id', 'excerpt', 'thumbnail_image', 'body'
    ];

    public function getThumbnailImageAttribute($value) {
        return asset($value);
    }

    // Relationships
    // To user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // To category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // To tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
