<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Post;

class FAvoriteController extends Controller {

    public function index() {
        $session_id = session('user_id');
        $user = User::find($session_id);
        if (!isset($user))
            return view('welcome');
        
        return view("favorite")->with("user", $user);
    }

    public function preferito($q){
        Post::find($q)->favorites()->toggle(session('user_id'));
        $user=User::find(session('user_id'));
        return response()->json([
            'npreferiti' => $user->npreferiti,
        ]);
    }
}
?>