<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;
use App\Models\Hotels;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RetRooms extends Controller
{
    public function getLatest(){



         $hname = User::where('id', '=', Auth::user()->id)->pluck('name');
        $hid = Hotels::where('hotelname', '=', $hname)->pluck('id');
        // dd($price);
        $r = Rooms::where('hotelid', '=', $hid)->get();
        $ord = count($r);
        $price = Rooms::where('hotelid', '=', $hid)->orderByDesc('roomid')->take(2)->pluck('pricing');
        $cap = Rooms::where('hotelid', '=', $hid)->orderByDesc('roomid')->take(2)->pluck('cap');
        $name = Rooms::where('hotelid', '=', $hid)->orderByDesc('roomid')->take(2)->pluck('roomname');
        $descs = Rooms::where('hotelid', '=', $hid)->orderByDesc('roomid')->take(2)->pluck('desc');
        $php = Rooms::where('hotelid', '=', $hid)->orderByDesc('roomid')->take(2)->pluck('roomph');
        $ids = Rooms::where('hotelid', '=', $hid)->orderByDesc('roomid')->take(2)->pluck('roomid');

        if($ord==0){
            return redirect()->intended('new');
        }
        else {
        return view('htelrooms', compact('ord', 'name','descs', 'price', 'cap','php', 'ids'));
    }
    }

    public function getAllR() {

        $hname = User::where('id', '=', Auth::user()->id)->pluck('name');
        $hid = Hotels::where('hotelname', '=', $hname)->pluck('id');

        $r = Rooms::where('hotelid', '=', $hid)->get();
        $ord = count($r);
        $ords = count($r);
        $price = Rooms::where('hotelid', '=', $hid)->orderBy('roomname', "asc")->pluck('pricing');
        $cap = Rooms::where('hotelid', '=', $hid)->orderBy('roomname', "asc")->pluck('cap');
        $name = Rooms::where('hotelid', '=', $hid)->orderBy('roomname', "asc")->pluck('roomname');
        $php = Rooms::where('hotelid', '=', $hid)->orderBy('roomname', "asc")->pluck('roomph');
        $ids = Rooms::where('hotelid', '=', $hid)->orderBy('roomname', "asc")->pluck('roomid');

        return view('allrooms', compact('ords','r','ord', 'name', 'price', 'cap','php', 'ids'));
    }

    public function getRoomCount() {
        $hname = User::where('id', '=', Auth::user()->id)->pluck('name');
        $hid = Hotels::where('hotelname', '=', $hname)->pluck('id');

        $r = Rooms::where('hotelid', '=', $hid)->get();
        $ss = count($r);
        return view('htledash', compact('ss'));
    }

    public function new(){
        $const = "new";
        $ord=0;
        return view('hro', compact('const', 'ord'));
    }




}
