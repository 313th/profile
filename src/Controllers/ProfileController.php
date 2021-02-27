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

class ProfileController extends Controller {
    /**
     * Display the registration view.
     *
     * @return Theme
     */
    public function edit()
    {
        return Theme::view('profile.edit');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $request->validate([
            'display_name' => 'required|string|max:255|min:4',
            'username' => 'required|string|min:6|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'email' => 'string|email|max:255|required_without:mobile',
            'mobile' => 'alpha_num|email|size:11|starts_with:09|required_without:email',

        ]);

        Auth::login($user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'display_name' => $request->display_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
