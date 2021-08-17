<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'user_id', 'image', 'facebook', 'twitter', 'github', 'about'
    ];

    protected $appends = [
        'image_path'
    ];

    // Get image path attribute
    public function getImagePathAttribute()
    {
        return asset('uploads/users/' . $this->image);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
