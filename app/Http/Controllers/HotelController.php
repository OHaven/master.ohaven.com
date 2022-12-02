<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Hotels;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{
    public function index(){
        Fortify::authenticateUsing(function (Request $request) {
            $user = Hotels::where('email', $request->email)->first();

            if ($user &&
                Hash::check($request->password, $user->password)) {
                    Auth::login($user);
                    return redirect()->intended('hteldash');
            }
            else{
                return redirect()->intended('htelreg');
            }
        });

        }
}
