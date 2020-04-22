<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    
    use Notifiable;
    protected $table = 'user';    
    
    public function statuses()
    {
        return $this->hasMany(Status::class);
    }
    
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follower', 'user_id', 'follower_id');
    }
    
    public function followings()
    {
        return $this->belongsToMany(User::class, 'follower', 'follower_id', 'user_id');
    }
    
    public function follow($user_ids)
    {
        if(!is_array($user_ids)) {
            $user_ids = compact('user_ids');
        }
        $this->followings()->sync($user_ids, false);
    }
    
    public function unfollow($user_ids)
    {
        if(!is_array($user_ids)) {
            $user_ids = compact('user_ids');
        }
        $this->followings()->detach($user_ids);
    }
    
    public function isFollowing($user_id)
    {
        return $this->followings->contains($user_id);
    }
    
    protected $fillable = [
        'username', 'email', 'password','is_admin',
    ];
    
    protected $hidden = [
        'password', 
        'remember_token',
    ];
    
    protected $casts = [
//        'email_verified_at' => 'datetime',
        'is_admin'=>'boolean',
    ];
}
