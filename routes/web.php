<?php

use Illuminate\Support\Facades\Route;
use Facuz\Theme\Facades\Theme;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| General Auth Routes
|--------------------------------------------------------------------------
*/
Route::get('/login',[sahifedp\Profile\Controllers\LoginController::class,'create'])
    ->middleware(['web'])
    ->name('login');

Route::post('/login',[sahifedp\Profile\Controllers\LoginController::class,'store'])
    ->middleware(['web'])
    ->name('login');

Route::get('/logout',[sahifedp\Profile\Controllers\LoginController::class,'destroy'])
    ->middleware(['web'])
    ->name('logout');
/*=====================*/
Route::get('/register',[sahifedp\Profile\Controllers\RegisterController::class,'create'])
    ->middleware(['web','guest'])
    ->name('register');

Route::post('/register',[sahifedp\Profile\Controllers\RegisterController::class,'store'])
    ->middleware(['web','guest'])
    ->name('register');
/*=====================*/
//Route::get('/verify/', [sahifedp\Profile\Controllers\VerifyController::class, 'notice'])
//    ->middleware(['web','auth'])
//    ->name('verification.notice');
//
//Route::get('/verify/submit/{?type}', [sahifedp\Profile\Controllers\VerifyController::class, 'code'])
//    ->middleware(['web','auth'])
//    ->name('verification.code');
//
//Route::post('/verify/submit/{?type}', [sahifedp\Profile\Controllers\VerifyController::class, 'submit'])
//    ->middleware(['web','auth'])
//    ->name('verification.submit');
//
//Route::get('/verify/{id}/{hash}', [sahifedp\Profile\Controllers\VerifyController::class, 'verify'])
//    ->middleware(['web','auth', 'signed', 'throttle:6,1'])
//    ->name('verification.verify');
//
//Route::post('/verify/resend/{type}', [sahifedp\Profile\Controllers\VerifyController::class, 'send'])
//    ->middleware(['web','auth', 'throttle:4,1'])
//    ->name('verification.send');
/*=====================*/
//Route::get('/forgot-password', [sahifedp\Profile\Controllers\ForgotPasswordController::class, 'create'])
//    ->middleware('guest')
//    ->name('password.forgot');
//
//Route::post('/forgot-password', [sahifedp\Profile\Controllers\ForgotPasswordController::class, 'store'])
//    ->middleware('guest')
//    ->name('password.request');
/*=====================*/
//Route::get('/reset-password', [NewPasswordController::class, 'create'])
//    ->middleware('guest')
//    ->name('password.reset');
//Route::post('/reset-password', [NewPasswordController::class, 'store'])
//    ->middleware('guest')
//    ->name('password.change');
//
//Route::get('/reset-password/{token}', [NewPasswordController::class, 'update'])
//    ->middleware('guest')
//    ->name('password.update');
/*=====================*/
//Route::get('/locked', [sahifedp\Profile\Controllers\UnlockController::class, 'create'])
//    ->middleware(['web','auth'])
//    ->name('password.confirm');
//
//Route::post('/locked', [sahifedp\Profile\Controllers\UnlockController::class, 'store'])
//    ->middleware(['web','auth']);
/*
|--------------------------------------------------------------------------
| Profile Functions Routes
|--------------------------------------------------------------------------
*/
//Route::prefix('profile')
//    ->name('profile.')
//    ->middleware(['web'])
//    ->group(function () {
//        Route::get('/edit/{user_id}',[sahifedp\Profile\Controllers\ProfileController::class,'edit'])
//            ->name('edit');
//        Route::post('/update/{user_id}',[sahifedp\Profile\Controllers\ProfileController::class,'update'])
//            ->name('store');
//    });
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
//Route::group(['middleware'=>['web','auth']],function (){
//    Route::get('/'.env('ADMIN_URL'), [sahifedp\Profile\Controllers\Admin\DefaultController::class, 'dashboard'])
//    ->name('admin.dashboard');
//});

Route::get('/'.env('ADMIN_URL'), [sahifedp\Profile\Controllers\Admin\DefaultController::class, 'dashboard'])
    ->middleware(['web','auth', 'theme:' . env('ADMIN_THEME')])
    ->name('admin.dashboard');

Route::match(['post','get'],'/'.env('ADMIN_URL').'/login', [\sahifedp\Profile\Controllers\Admin\DefaultController::class,'login'])
    ->middleware(['theme:' . env('ADMIN_THEME').',empty','web'])
    ->name('admin.login');


Route::middleware(['web', 'auth', 'theme:' . env('ADMIN_THEME')])
    ->prefix(env('ADMIN_URL'). '/profile')
    ->name(env('ADMIN_URL') . '.profile.')
    ->group(function () {
        /** Begin Admin Routes */
        Route::get('index', [sahifedp\Profile\Controllers\Admin\DefaultController::class, 'index'])
            ->name('index');
        Route::get('create/', [sahifedp\Profile\Controllers\Admin\DefaultController::class, 'create'])
            ->name('create');
        Route::post('store/', [sahifedp\Profile\Controllers\Admin\DefaultController::class, 'store'])
            ->name('store');
        Route::get('edit/{user_id}', [sahifedp\Profile\Controllers\Admin\DefaultController::class, 'edit'])
            ->name('edit');
        Route::post('update/{user_id}', [sahifedp\Profile\Controllers\Admin\DefaultController::class, 'update'])
            ->name('update');
        Route::delete('delete/{user_id}', [sahifedp\Profile\Controllers\Admin\DefaultController::class, 'delete'])
            ->name('delete');
    });
