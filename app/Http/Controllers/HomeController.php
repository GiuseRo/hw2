<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;



class HomeController extends Controller{

    //ritorna informazioni sull'utente
    public function index() {
        $session_id = session('user_id');
        $user = User::find($session_id);
        if (!isset($user))
            return view('welcome');
        
        return view("home")->with("user", $user);
    }
    

     public function salva(Request $request){

       $content=[
        "url" => $request->squadra,
        "anno" => $request->anno,
        "posizione" => $request->posizione,
        "vittorie" => $request->vittorie,
        "sconfitte" => $request->sconfitte,
        "pareggi" => $request->pareggi,
        "goal_fatti" => $request->goal_fatti,
        "goal_subiti" => $request->goal_subiti,
        "differenza" => $request->differenza,
        "punti" => $request->punti,
    ];
        $post=new Post;
        $post->user_id=session('user_id');
        $post->content=$content;
        $post->save();      
    }

    public function tempo($q){
        $old = strtotime($q); 
        $diff = time() - $old;           
        $old = date('d/m/y', $old);
    
        if ($diff /60 <1) {
            return json_encode(intval($diff%60)." secondi fa");
        } else if (intval($diff/60) == 1)  {
            return json_encode("Un minuto fa");  
        } else if ($diff / 60 < 60) {
            return json_encode(intval($diff/60)." minuti fa");
        } else if (intval($diff / 3600) == 1) {
            return json_encode("Un'ora fa");
        } else if ($diff / 3600 <24) {
            return json_encode(intval($diff/3600) . " ore fa");
        } else if (intval($diff/86400) == 1) {
            return json_encode("Ieri");
        } else if ($diff/86400 < 30) {
            return json_encode(intval($diff/86400) . " giorni fa");
        } else {
            return json_encode($old); 
        }
    }
}


?>