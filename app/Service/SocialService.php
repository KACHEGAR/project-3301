<?php namespace App\Service;

use App\Models\User;
use http\Env\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class SocialService {

    public function saveSocialData($user){
        Session::reflash();
        $email = $user->getEmail();
        $name = $user->getName();
        $avatar = $user->getAvatar();

        //Проверка есть ли почта
        if (Session::has("add_email")) {
            $email = Session::get('add_email');
        }
        if($email==null&&!Session::exists("add_email")){
            return false;
        }

        $pass = Hash::make('12345678');
        $data = ['email' => $email,'password'=>$pass,'name'=>$name,'avatar'=>$avatar];
        $u = User::where('email',$email)->first();


        if($u){
            return $u->fill(['name'=>$name,'avatar'=>$avatar]);
        }

        return User::create($data);
    }
}
