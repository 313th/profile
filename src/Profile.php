<?php


namespace sahifedp\Profile;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Profile {
    public static function logout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
    }
}
