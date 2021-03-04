<?php


namespace sahifedp\Profile\Controllers;

use DateTime;
use DateTimeZone;
use App\Http\Controllers\Controller;
use sahifedp\Profile\Models\User;
use Facuz\Theme\Facades\Theme;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use sahifedp\Profile\Models\UserProfile;
use sahifedp\Profile\Profile;

class RegisterController extends Controller {
    /**
     * Display the registration view.
     *
     * @return Theme
     */
    public function create()
    {
        return Theme::view(['view'=>'profile.register','layout'=>'landing']);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:4',
            'family' => 'required|string|max:255|min:4',
            'username' => 'required|alpha_num|min:10|unique:users',
            'birth_date' => 'required|int',
        ]);
        $date = new DateTime();
        $date->setTimestamp($request->birth_date/1000);
        $date->setTimezone(new DateTimeZone('Asia/Tehran'));
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->username),
            'display_name' => $request->name.' '.$request->family,
        ]);
        UserProfile::create([
            'id' => $user->id,
            'name' => $request->name,
            'family' => $request->family,
            'nation_code' => $request->username,
            'birth_date' => $date->format('Y-m-d')
        ]);
        $user->assignRole('Student');
        Auth::login($user);
        event(new Registered($user));
        if(Auth::check())
            return redirect(route('profile.edit'));
        return  redirect(route('register'));
    }

    public function trackingCode(Request $request){
        $code = mt_rand(11111111,99999999);
        Auth::user()->password = Hash::make($code);
        Auth::user()->save();
        Profile::logout($request);
        return Theme::view(['view'=>'profile.tracking-code','layout'=>'landing'],['code'=>$code]);
    }
}
