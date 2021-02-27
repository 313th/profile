<?php


namespace sahifedp\Profile\Controllers;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Facuz\Theme\Facades\Theme;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VerifyController extends Controller {

    public function notice(Request $request) {
        //TODO: Check if user verified->Redirect Back, Or else Show verification view
        return Theme::view('profile.verify.notice');
    }
    public function code(Request $request) {
        //TODO: Check if user verified->Redirect Back, Or else show submit code view
        return Theme::view('profile.verify.code');
    }
    public function submit(Request $request) {
//        return Theme::view('profile.verify');
    }
    public function verify(Request $request) {
        //TODO: Check if user verified->Redirect To home with "Alredy Verified Message", Redirect To home with "Verification Success/Unsuccess Message"
        return Theme::view('profile.verify.verify');
    }
    public function send(Request $request) {
//        return Theme::view('profile.verify');
    }
}
