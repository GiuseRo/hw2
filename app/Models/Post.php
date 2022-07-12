<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    //protected $table = 'posts';

    /*protected $fillable = [
        'user_id', 'content'
    ];*/

    protected $casts = [
        'content' => 'array'
    ];

    public function user() {
        return $this->belongsTo("App\Models\User");
    }

    public function likes() {
        return $this->belongsToMany('App\Models\User', 'likes');
    }

    public function favorites() {
        return $this->belongsToMany('App\Models\User','favorites');
    }
}

?>