<?php


namespace sahifedp\Profile\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Facuz\Theme\Facades\Theme;
use Illuminate\Http\Request;
use sahifedp\Profile\Profile;

class DefaultController extends Controller {
    public function login(Request $request){
        if($request->isMethod('get')){
            return Theme::view('profile.login');
        }
        $request->authenticate();
        $request->session()->regenerate();
        return redirect()->intended(route('dashboard'));
    }

    public function logout(Request $request){
        return Profile::logout($request);
    }

    public function register(){

    }

    public function resetPassword(){

    }

    public function edit(){

    }

    public function store(){

    }
}
