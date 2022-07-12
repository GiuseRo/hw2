<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Post;


class FeedController extends BaseController {
    public function feed() {
      // $posts=Post::all();
        $posts=Post ::orderBy('created_at','desc')->get();
        //The load method eager loads the given relationships for all models in the collection:
       return $posts->load(['user:id,username'])->load(['likes:username'])->load(['favorites:username']);
}

}
?>