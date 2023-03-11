<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';

    protected $primaryKey = 'menu_id';

    protected $fillable = ['title','parent_id','type'];

    public function children(){
        return $this->hasMany(Menu::class,'parent_id','menu_id');
    }

    public function parent(){
        return $this->belongsTo(Menu::class,'id','parent_id');
    }
}
