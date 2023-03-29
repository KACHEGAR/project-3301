<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use App\Service\SocialService;

class SocialController extends Controller
{
    public function index(){
        Session::reflash();
        return Socialite::driver('vkontakte')->redirect();

    }

    public function callback(){
        $user = Socialite::driver('vkontakte')->user();
        $objSocial = new SocialService();
        if($user = $objSocial->saveSocialData($user)){
            Auth::login($user);
            return redirect()->route('profile');
        }else{
            return redirect()->route("add_email");
        }
//        return back();

    }

    public function addEmail(Request $request){
        Session::reflash();
        $request->session()->flash('add_email', $request->add_email);
        return redirect()->route("vk.auth");

    }
}
