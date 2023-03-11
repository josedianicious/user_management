<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'profile_img',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'user_id',
        'remember_token',
    ];

    /**
     * Table name
     */
    protected $table = "users";

    /**
     * Primarykey of the table
     */
    protected $primaryKey = "user_id";

    public function userLogin(){
        return $this->hasOne(UserLogin::class,'user_id','user_id');
    }

    public function getPasswordAttribute()
    {
        return $this->userLogin->getAttribute('password');
    }

    public function getUserNameAttribute()
    {
        return $this->userLogin->getAttribute('user_name');
    }

    protected  $appends = ['password','user_name'];

    public function getAuthPassword()
    {
        return $this->attributes['password'];
    }

    public function getUserName()
    {
        return $this->attributes['user_name'];
    }


}
