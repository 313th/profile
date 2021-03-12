<?php


namespace sahifedp\Profile\Controllers\Admin;

use App\Http\Controllers\Controller;
use Facuz\Theme\Facades\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller {
    public function dashboard(){
        return Theme::view('index');
    }

    public function index(){
        return Theme::view('index');
    }

    public function login(Request $request){
        if(Auth::check()){
            return redirect()->intended(route('admin.dashboard'));
        }
        if($request->isMethod('get'))
            return Theme::view('login');

        if(Auth::attempt(['username'=>$request->username,'password'=>$request->password],isset($request->remember))){
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect()->refresh()->with('error',['message'=>'ERROR']);
    }

    public function create(){
        return Theme::view('index');
    }

    public function store(){

    }

    public function edit(){

    }

    public function update(){

    }

    public function remove(){

    }
}
