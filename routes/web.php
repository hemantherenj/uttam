<?php

use App\Livewire\BACK\Home as BACKHome;
use App\Livewire\BACK\Login as BACKLogin;
use App\Livewire\BACK\Products as BACKProducts;
use App\Livewire\BACK\Profiles as BACKProfiles;
use App\Livewire\BACK\Register as BackRegister;
use App\Livewire\FRONT\Home;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminAuth;
use App\Http\Middleware\FrontAuth;
use App\Livewire\FRONT\Form;
use App\Livewire\FRONT\Login;
use App\Livewire\FRONT\Profile;
use App\Livewire\FRONT\ProfileDetail;

// Route::get('admin/register', BackRegister::class)->name('admin.register');
// Route::get('admin/login', BackLogin::class)->name('admin.login');
// Route::get('admin', BackLogin::class)->name('admin')->middleware('auth');
// Route::get('/admin', function () {
//     return "Welcome to Dashboard!";
// })->name('admin')->middleware('auth');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', Home::class)->name('home');
Route::get('/login', Login::class)->name('login');


// User area
// Route::middleware([FrontAuth::class])->prefix('')->group(function () {
       
// });

Route::middleware('auth:front')->group(function () {
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/form', Form::class)->name('form');
    Route::get('/detail/{id}', ProfileDetail::class)->name('detail');

    Route::get('/dashboard', function () {
        return "User Dashboard (" . auth('front')->user()->profile_for . ")";
    });
    Route::post('/logout', function () {
        Auth::guard('front')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    })->name('logout');
});



// ADMIN ROUTE

Route::middleware([AdminAuth::class])->prefix('admin')->group(function () {
    Route::get('/', BACKHome::class)->name('admin');
    Route::get('/products', BACKProducts::class)->name('admin.products');
    Route::get('/profiles', BACKProfiles::class)->name('admin.profiles');
    Route::post('/logout', function () {
        Auth::guard('user')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/admin');
    })->name('admin.logout');
});

Route::group(['prefix' => '/admin', BACKHome::class], function () {
    Route::get('/login', BACKLogin::class)->name('admin.login');
    Route::get('/register', BackRegister::class)->name('admin.register');
});




//     Route::group(['middleware' => ['auth:admin']], function () {
    //         Route::get('/', BACKHome::class)->name('admin');
    //         Route::get('/products', BACKProducts::class)->name('admin.products');
    //         Route::get('/profiles', BACKProfiles::class)->name('admin.profiles');
    //     });
