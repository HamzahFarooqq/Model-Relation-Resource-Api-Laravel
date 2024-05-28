<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $appends = ['registered'];





   
    protected $fillable = [
        'name',
        'email',
        'password',
    ];




   
    protected $hidden = [
        'password',
        'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    // Mutator
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
        // $this->attributes['name'] = strtoupper($value);
    }

    //Accessor
    // public function getNameAttribute($value)
    // {
    //     return strtolower($value);
    // }



    
        public function getRegisteredAttribute()
        {
            return $this->created_at->diffForHumans();
        }





    // ONE TO ONE 
    public function phone()
    {
        return $this->hasOne(Phone::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role', 'user_id', 'role_id');
    }


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
