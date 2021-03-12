<?php


namespace sahifedp\Profile\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use sahifedp\jdf\jdf;
use sahifedp\Profile\Models\User;
use App\Providers\RouteServiceProvider;
use Facuz\Theme\Facades\Theme;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DateTime;
use DateTimeZone;

class ProfileController extends Controller {
    /**
     * Display the registration view.
     *
     * @return Theme
     */
    public function edit()
    {
        //TODO: Add Grade value to Min and Max Date
        $minDate = (new DateTime(jdf::jalali_to_gregorian(env('CURRENT_YEAR') - 6,7,1,'-')))->getTimestamp() * 1000;
        $maxDate = (new DateTime(jdf::jalali_to_gregorian(env('CURRENT_YEAR') - 6 + 2,6,31,'-')))->getTimestamp() * 1000;
        return Theme::view('profile.edit',['user'=>Auth::user(),'minDate'=>$minDate,'maxDate'=>$maxDate]);
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
            'birth_date' => 'required|int',
            'email' =>  'email',
            'mobile' =>  'required|alpha_num|starts_with:09|size:11',
            'address' =>  'required|string|min:10',
            'postal_code' =>  'required|alpha_num|size:10',
            'tel' =>  'required|string',
        ]);

        $date = new DateTime();
        $date->setTimestamp($request->birth_date/1000);
        $date->setTimezone(new DateTimeZone('Asia/Tehran'));
        $user = Auth::user();
        $user->email = $request->email;
        $user->username = $request->nation_code;
        $user->display_name = $request->name.' '.$request->family;
        $user->mobile = $request->mobile;
        $user->profile->name = $request->name;
        $user->profile->family = $request->family;
        $user->profile->nation_code = $request->nation_code;
        $user->profile->birth_date = $date->format('Y-m-d');
        $user->profile->address = $request->address;
        $user->profile->postal_code = $request->postal_code;
        $user->profile->tel = $request->tel;
        if($user->save())
            $user->profile->save();
        return redirect(route('profile.legal.edit'));
    }
}
