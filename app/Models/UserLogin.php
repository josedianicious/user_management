<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLogin extends Model
{
    use HasFactory;

    protected $guarded = [];


    /**
     * Attributes that should be hidden from seriralization
     */
    protected $hidden = [
        'user_id',
        'password'
    ];

    /**
     * Table name
     */
    protected $table = 'user_logins';

    /**
     * Primary key of the table
     */
    protected $primaryKey = 'user_login_id';

    public function user(){
        return $this->belongsTo(User::class,'user_id','user_id');
    }

}
