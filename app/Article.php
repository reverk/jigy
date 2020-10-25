<?php

namespace App;

use App\Helpers\Helper;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'category_id', 'excerpt', 'thumbnail_image', 'body', 'user_id', 'is_outside'
    ];

    public function getThumbnailImageAttribute($value)
    {
        return asset($value);
    }

    public function getIsOutsideAttribute($value)
    {
        return Helper::convert_isOutside($value);
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
