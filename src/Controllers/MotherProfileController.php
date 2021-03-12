<?php


namespace sahifedp\Profile\Controllers;


use App\Http\Controllers\Controller;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use sahifedp\Helpers\Rules\Digit;
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

class MotherProfileController extends Controller {
    /**
     * Display the registration view.
     *
     * @return Theme
     */
    public function edit()
    {
        //TODO: Check role is "Student"
        $minDate = "null";
        $maxDate = "null";
        return Theme::view('profile.parent.edit',['user'=>Auth::user(),'key'=>'mother','title'=>'مادر','minDate'=>$minDate,'maxDate'=>$maxDate]);
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
                'required','min:10',
                new Digit(),
                Rule::unique('user_profiles')->ignore(@ Auth::user()->mother->id)
            ]
        ])->validate();
        $request->validate([
            'name' => 'required|string|max:255|min:2',
            'family' => 'required|string|max:255|min:2',
            'birth_date' => 'required|int',
            'email' =>  'email|nullable',
            'mobile' =>  'required|alpha_num|starts_with:09|size:11',
            'certificate_number' => 'required|alpha_num',
            'place_of_birth' => 'required|string|max:255|min:3',
            'place_of_issuance' => 'required|string|max:255|min:3',
            'birth_certificate_serial' => 'required|string|max:255|min:7',
            'religion' => 'required|string|max:255',
            'religion_branch' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'relation_status' => 'required|int',//TODO: just select in array
            'job' => 'required|string|max:255',
            'education' => 'required|int',//TODO: just select in array
            'field_of_study' => 'required|string|max:255',
            'personnel_id' => 'alpha_num|nullable',
            'address' =>  'required|string|min:10',
            'postal_code' =>  'required|alpha_num|size:10',
            'tel' =>  'required|string',
        ]);

        DB::transaction(function() use ($request) {
            $date = new DateTime();
            $date->setTimestamp($request->birth_date/1000);
            $date->setTimezone(new DateTimeZone('Asia/Tehran'));

            $user = User::firstOrNew([
                'username' => $request->nation_code,
            ]);
            $user->email = $request->email;
            $user->display_name = $request->name . ' ' . $request->family;
            $user->password = Hash::make($request->nation_code);
            $user->mobile = $request->mobile;
            $user->save();

            $relation = UserRelation::firstOrNew([
                'from_user_id' => Auth::id(),
                'to_user_id' => $user->id,
                'relation' => UserRelation::USER_RELATION_MOTHER,
            ]);
            $relation->status = $request->relation_status;
            $relation->save();

            $profile = UserProfile::firstOrNew([
                'id' => $user->id,
            ]);
            $profile->name = $request->name;
            $profile->family = $request->family;
            $profile->nation_code = $request->nation_code;
            $profile->birth_date = $date->format('Y-m-d');
            $profile->address = $request->address;
            $profile->postal_code = $request->postal_code;
            $profile->tel = $request->tel;
            $profile->save();

            $legal = UserLegalInformation::firstOrNew([
                'id' => $user->id,
            ]);
            $legal->certificate_number = $request->certificate_number;
            $legal->place_of_birth = $request->place_of_birth;
            $legal->place_of_issuance = $request->place_of_issuance;
            $legal->birth_certificate_serial = $request->birth_certificate_serial;
            $legal->religion= $request->religion;
            $legal->religion_branch = $request->religion_branch;
            $legal->nationality = $request->nationality;
            $legal->save();

            $employment = UserEmploymentInformation::firstOrNew([
                'id' => $user->id,
            ]);
            $employment->job = $request->job;
            $employment->education = $request->education;
            $employment->field_of_study = $request->field_of_study;
            $employment->personnel_id = $request->personnel_id;
            $employment->save();
        });
        return redirect(route('profile.social.edit'));
    }
}
