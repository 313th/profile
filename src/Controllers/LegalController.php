<?php


namespace sahifedp\Profile\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Facuz\Theme\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use sahifedp\Profile\Models\UserLegalInformation;

class LegalController extends Controller {

    /**
     * Display the registration view.
     *
     * @return Theme
     */
    public function edit()
    {
        //TODO: Check role is "Student"
        return Theme::view('profile.legal',['user'=>Auth::user(),'key'=>'father','title'=>'پدر']);
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
            'certificate_number' => 'required|alpha_num',
            'place_of_birth' => 'required|string|max:255|min:3',
            'place_of_issuance' => 'required|string|max:255|min:3',
            'birth_certificate_serial' => 'required|string|max:255|min:7',
            'religion' => 'required|string|max:255',
            'religion_branch' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
        ]);

        $legal = UserLegalInformation::firstOrNew(['id' => Auth::id()]);
        $legal->certificate_number = $request->certificate_number;
        $legal->place_of_birth = $request->place_of_birth;
        $legal->place_of_issuance = $request->place_of_issuance;
        $legal->birth_certificate_serial = $request->birth_certificate_serial;
        $legal->religion= $request->religion;
        $legal->religion_branch = $request->religion_branch;
        $legal->nationality = $request->nationality;
        $legal->save();
        return redirect(route('profile.father.edit'));
    }
}
