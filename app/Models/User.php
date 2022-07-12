<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    
   // protected $table = 'users';
    
   protected $fillable = [
    'username', 'password', 'email', 'name', 'surname'
];


    public function posts() {
        return $this->hasMany("App\Models\Post");
    }

    public function likes() {
        return $this->belongsToMany('App\Models\Post', 'likes');
    }

    public function favorites() {
            return $this->belongsToMany('App\Models\Post','favorites');
        }

}
