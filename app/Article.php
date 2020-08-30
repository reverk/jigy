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
        'title', 'slug', 'excerpt', 'thumbnail_image', 'body'
    ];

    // Relationships
    // To user
    public function user() {
        return $this->belongsTo(User::class);
    }

    // To category
    public function category() {
        return $this->belongsTo(Category::class);
    }

    // TODO: Add tag relationship
}
