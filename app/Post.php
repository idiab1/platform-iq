<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Post extends Model
{

    use softDeletes;
    protected $guarded = ['id'];
    protected $fillable = [
        'title', 'content', 'image', 'category_id', 'slug'
    ];

    protected $dates = ['deleted_at'];

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


    /**
     * The tags that belong to the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany("App\Tag");
    }
}
