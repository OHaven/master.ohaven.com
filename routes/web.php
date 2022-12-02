<?php


use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HotelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\temp;
use App\Http\Controllers\Addroom;
use App\Http\Controllers\RetRooms;
use App\Http\Controllers\GetLocation;
use App\Http\Controllers\coupon;
use App\Models\Rooms;



        Route::get('/', function () {
        return view('home');
        })->name('lg');


        Route::get('/rg', function () {
            return view('home');
            })->name('rg');

        Route::get('/fgps', function () {
        return view('home');
        })->name('fgps');


        Route::get('/lg', function () {
            return view('home');
            })->name('lg');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    // Route::get('home', function () {
    //     return redirect()->intended('dashboard');
    //     });

    Route::get('dashboard', [GetLocation::class, 'retloc'])->name('dashboard');
    Route::get('/fhotel', [GetLocation::class, 'passloc'])->name('fhotel');
    Route::get('uhrooms',  [GetLocation::class, 'htails'])->name('uhrooms');
    Route::get('viewallrooms',  [GetLocation::class, 'viewallroom'])->name('viewallrooms');
    Route::get('sortprice',  [GetLocation::class, 'sortbyprice'])->name('viewallrooms');
    Route::get('sortcap',  [GetLocation::class, 'sortbycap'])->name('viewallrooms');
    Route::get('searchbyname',  [GetLocation::class, 'searchbyname'])->name('viewallroom');
    Route::get('new',  [RetRooms::class, 'new'])->name('new');
    Route::get('manpromo',  [coupon::class, 'addcoup'])->name('manpromo');
    Route::any('addcoup',  [coupon::class, 'newcoup'])->name('addcoup');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Route::get('/fhotel', function () {
    //     return view('findhotel');
    // })->name('fhotel');

    Route::get('htledash', function () {
        $r = Rooms::where('hotelid', '=', Auth::user()->id)->get();
        $ord = count($r);
        return view('htledash', compact('ord'));
    })->name('htledash');


    // Route::get('editroom', function () {
    //     return view('htelrooms');
    // })->name('editroom');

    Route::get('trans', function () {
        return view('transactions');
    })->name('trans');

    Route::get('allrooms',  [RetRooms::class, 'getAllR'])->name('allrooms');

    Route::get('retroom',  [RetRooms::class, 'getLatest'])->name('retroom');

    Route::get('delete',  [addroom::class, 'delete']);

    Route::post('addroom', [addroom::class, 'addroom']);

    Route::post('updateroom', [addroom::class, 'upRoom']);

    Route::get('editroom', [addroom::class, 'editroom']);
});

Route::get('google-autocomplete', [GoogleController::class, 'index']);



Route::get('logout', function () {
    return view('home');
})->name('lg');

Route::get('htel', function () {
    return view('htelreg');
})->name('hotellogin');

Route::controller(LoginController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});



// Route::post('loginhotel', [HotelController::class, 'index']);


Route::get('rghotel', function () {
    return view('htelreg');
});

Auth::routes();

