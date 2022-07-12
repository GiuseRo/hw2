<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller {

    protected function registrazione()
    {
        $session_user=session('user_id');
        if(isset($session_user))
        return view('home')->with('user',$session_user);
        else{
        $request = request();

        if($this->countErrors($request) === 0) {
            $newUser =  User::create([
            'username' => $request['username'],
            'password' => password_hash($request['password'],PASSWORD_BCRYPT),
            'name' => $request['name'],
            'surname' => $request['surname'],
            'email' => $request['email'],
            ]);
            if ($newUser) {
                Session::put('user_id', $newUser->id);
                return redirect('home');
            } 
            else {
                return redirect('register')->withInput();
            }
        }
        else {
              return redirect('register')->withInput();
        }
        
        } 
    }


    private function countErrors($data) {
        $error = array();
        # USERNAME
        // Controlla che l'username rispetti il pattern specificato
        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $data['username'])) {
            $error[] = "Username non valido";
        } else {
            $username = User::where('username', $data['username'])->first();
            if ($username !== null) {
                $error[] = "Username già utilizzato";
            }
        }
        # PASSWORD
        if (strlen($data["password"]) < 8) {
            $error[] = "Caratteri password insufficienti";
        } 
        # CONFERMA PASSWORD
        if ($data["password"]===$data["password_confirmation"]) {
            $error[] = "Le password non coincidono";
        }
        # EMAIL
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = User::where('email', $data['email'])->first();
            if ($email !== null) {
                $error[] = "Email già utilizzata";
            }
        }
        print_r ( $error);
        return count($error);
    }

        public function checkUsername($query){
            $exist = User::where('username', $query)->exists();
                 return ['exists' => $exist];
          }

        public function checkEmail($query){
            $exist = User::where('email', $query)->exists();
            return ['exists' => $exist];
        }
        
        public function index() {
            return view('register');
        }

}
?>