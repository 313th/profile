<?php


namespace sahifedp\Profile\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use sahifedp\Profile\Requests\Auth\LoginRequest;
use Facuz\Theme\Facades\Theme;
use Illuminate\Http\Request;
use sahifedp\Profile\Profile;

class LoginController extends Controller {

    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return Theme::view(['view'=>'profile.login','layout'=>'simple']);
    }

    public function store(LoginRequest $request){
        $request->authenticate();
        $request->session()->regenerate();
        return redirect()->intended(route('dashboard'));
    }

    public function destroy(Request $request){
        Profile::logout($request);
        return redirect(route('login'));
    }
}
