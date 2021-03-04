<?php


namespace sahifedp\Profile\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use sahifedp\Requests\Auth\LoginRequest;
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
        return Theme::view('profile.login');
    }

    public function store(LoginRequest $request){
        $request->authenticate();
        $request->session()->regenerate();
        return redirect()->intended(route('dashboard'));
    }

    public function destroy(Request $request){
        return Profile::logout($request);
    }
}
