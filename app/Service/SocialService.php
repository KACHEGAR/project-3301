<?php namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SocialService {
    public function saveSocialData($user){
        $email = $user->getEmail();
        $name = $user->getName();
        $avatar = $user->getAvatar();

        if($email==null){
            $email = Str::random(10)."@mail.ru";
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
