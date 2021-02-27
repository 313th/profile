<?php


namespace sahifedp\Profile\Controllers;

use App\Http\Controllers\Controller;
use Facuz\Theme\Facades\Theme;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller {

    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        //TODO: Show confirm code + New Password + Confirm Password + ... view.
        return Theme::view('profile.reset-password');
    }

    public function store(Request $request){
        //TODO: Change password if credential(Mobile) OK
        return redirect()->intended(route('login'));
    }

    public function update(Request $request){
//        $request->validate([
//            'token' => 'required',
//            'username' => 'required|email',
//            'password' => 'required|string|confirmed|min:8',
//        ]);
//
//        // Here we will attempt to reset the user's password. If it is successful we
//        // will update the password on an actual user model and persist it to the
//        // database. Otherwise we will parse the error and return the response.
//        $status = Password::reset(
//            $request->only('email', 'password', 'password_confirmation', 'token'),
//            function ($user) use ($request) {
//                $user->forceFill([
//                    'password' => Hash::make($request->password),
//                    'remember_token' => Str::random(60),
//                ])->save();
//
//                event(new PasswordReset($user));
//            }
//        );
//
//        // If the password was successfully reset, we will redirect the user back to
//        // the application's home authenticated view. If there is an error we can
//        // redirect them back to where they came from with their error message.
//        return $status == Password::PASSWORD_RESET
//            ? redirect()->route('login')->with('status', __($status))
//            : back()->withInput($request->only('email'))
//                ->withErrors(['email' => __($status)]);
        //TODO: Change password if credential(Token) OK
        return redirect()->intended(route('login'));
    }
}
