<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'title', 'content', 'image', 'category_id'
    ];

    protected $appends = [
        'image_path'
    ];

    // Get image path attribute
    public function getImagePathAttribute()
    {
        return asset('uploads/posts/' . $this->image);
    }

    /**
     * Get the category that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
