<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = [
        'user_id', 'avatar', 'facebook', 'twitter', 'github', 'about'
    ];
    protected $appends = [
        'image_path'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get path attribute for avatar
     *
     */
    public function getAvatarPathAttribute()
    {
        return asset('uploads/users/' . $this->avatar);
    }
}
