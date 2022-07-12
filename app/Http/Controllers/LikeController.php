<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Post;

class LikeController extends Controller{

    public function like($query) {
        //fare fare a questa funzione ci che faceva prima like_post.php
        $user = User::find(session('user_id'));
        /* toggle method  for many to many
        If the given ID is currently attached, it will be detached. 
        Likewise, if it is currently detached, it will be attached: */
        Post::find($query)->likes()->toggle($user->id);
        $post = Post::find($query);
        return response()->json([
            'nlikes' => $post->nlikes,
        ]);
    }

}


?>