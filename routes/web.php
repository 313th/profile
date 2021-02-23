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

Route::match(['get','post'],'/login',[sahifedp\Profile\Controllers\DefaultController::class,'login'])
    ->middleware(['web'])
    ->name('login');

Route::get('/logout',[sahifedp\Profile\Controllers\DefaultController::class,'logout'])
    ->middleware(['web'])
    ->name('logout');

Route::get('/register',[sahifedp\Profile\Controllers\DefaultController::class,'register'])
    ->middleware(['web'])
    ->name('register');

Route::prefix('profile')
    ->name('profile.')
    ->middleware(['web'])
    ->group(function () {
        Route::match(['get','post'],'/reset-password',[sahifedp\Profile\Controllers\DefaultController::class,'resetPassword'])
            ->name('reset');
        Route::get('/edit',[sahifedp\Profile\Controllers\DefaultController::class,'editProfile'])
            ->name('edit');
        Route::post('/update',[sahifedp\Profile\Controllers\DefaultController::class,'storeProfile'])
            ->name('store');
    });

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
