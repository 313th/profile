<?php


namespace sahifedp\Profile\Controllers;

use App\Http\Controllers\Controller;
use Facuz\Theme\Facades\Theme;
use Illuminate\Http\Request;
use sahifedp\Profile\Profile;

class DefaultController extends Controller {
    public function login(){

    }

    public function logout(Request $request){
        return Profile::logout($request);
    }

    public function register(){

    }

    public function resetPassword(){

    }

    public function editProfile(){

    }

    public function storeProfile(){

    }
}
