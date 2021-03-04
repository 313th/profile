<?php


namespace sahifedp\Profile\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use sahifedp\Profile\Models\User;
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
        return Theme::view('profile.edit',['user'=>Auth::user()]);
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
        Validator::make($request->all(),[
            'nation_code' => [
                'required','alpha_num','min:10',
                Rule::unique('user_profiles')->ignore(Auth::id())
            ]
        ]);
        $request->validate([
            'name' => 'required|string|max:255|min:4',
            'family' => 'required|string|max:255|min:4',
//            'birth_date' => 'string|min:8|max:10',
            'email' =>  'email',
            'mobile' =>  'required|alpha_num|starts_with:09|size:11',
            'address' =>  'required|string|min:10',
            'postal_code' =>  'required|alpha_num|size:10',
            'tel' =>  'required|string',
        ]);
//        $shamsi = explode('/',$request->birth_date);
//        $shamsiYear = $shamsi[2];
//        $shamsiMonth = $shamsi[1];
//        $shamsiDay = $shamsi[0];

        $user = Auth::user();
        $user->email = $request->email;
        $user->username = $request->nation_code;
        $user->display_name = $request->name.' '.$request->family;
        $user->mobile = $request->mobile;
        $user->profile->name = $request->name;
        $user->profile->family = $request->family;
        $user->profile->nation_code = $request->nation_code;
//        $user->profile->birth_date = jdf::jalali_to_gregorian($shamsiYear,$shamsiMonth,$shamsiDay,'-').' 00:00:00';
        $user->profile->address = $request->address;
        $user->profile->postal_code = $request->postal_code;
        $user->profile->tel = $request->tel;
        if($user->save())
            $user->profile->save();
        return redirect(route('profile.legal.edit'));
    }
}
