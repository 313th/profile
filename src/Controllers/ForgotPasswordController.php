<?php


namespace sahifedp\Profile\Controllers;

use App\Http\Controllers\Controller;
use Facuz\Theme\Facades\Theme;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller {

    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return Theme::view('profile.forgot-password');
    }

    public function store(Request $request){
        //TODO: Check type of recovery(Mobile|Email) and call correct helper
        //TODO: Redirect to correct route
        return redirect()->intended(route('login'));
    }
}
