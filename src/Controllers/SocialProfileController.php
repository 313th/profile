<?php


namespace sahifedp\Profile\Controllers;


use App\Http\Controllers\Controller;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use sahifedp\Profile\Models\User;
use App\Providers\RouteServiceProvider;
use Facuz\Theme\Facades\Theme;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use sahifedp\Profile\Models\UserEmploymentInformation;
use sahifedp\Profile\Models\UserLegalInformation;
use sahifedp\Profile\Models\UserProfile;
use sahifedp\Profile\Models\UserRelation;
use sahifedp\Profile\Models\UserSocialInformation;

class SocialProfileController extends Controller {
    /**
     * Display the registration view.
     *
     * @return Theme
     */
    public function edit()
    {
        //TODO: Check role is "Student"
        return Theme::view('profile.social',['user'=>Auth::user()]);
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
            'health_status' => [
                'required',
                Rule::in(array_keys(UserSocialInformation::USER_SOCIAL_DISEASES))
            ],
            'left_handed' => [
                'required',
                Rule::in(array_keys(UserSocialInformation::USER_SOCIAL_HAND_DIRECTION))
            ],
            'devotion_status' => [
                'required',
                Rule::in(array_keys(UserSocialInformation::USER_SOCIAL_DEVOTIONS))
            ],
            'charity_status' => [
                'required',
                Rule::in(array_keys(UserSocialInformation::USER_SOCIAL_CHARITIES))
            ],
        ]);
        $request->validate([
            'diseases' => 'string|nullable',
            'devotion' => 'string|nullable',
            'charity' => 'string|nullable',
        ]);

        $social = UserSocialInformation::firstOrNew(['id'=>Auth::id()]);
        $social->health_status = $request->health_status;
        $social->left_handed = $request->left_handed;
        $social->devotion_status = $request->devotion_status;
        $social->charity_status = $request->charity_status;
        $social->diseases = $request->diseases;
        $social->devotion = $request->devotion;
        $social->charity = $request->charity;
        $social->save();

        return redirect(route('profile.register.finish'));
    }
}
