<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Hotels;
use App\Models\Rooms;
use App\Models\User;
use App\Models\Promo;


class coupon extends Controller
{

    public function addcoup(Request $rq){
            $id = Auth::user()->id;
            $user = User::where('id', '=', $id)->pluck('name');
            $hname = Hotels::where('hotelname', '=', $user)->pluck('hotelname');
            $hid = Hotels::where('hotelname', '=', $hname)->pluck('id');



            $r = Rooms::where('hotelid', '=', $hid)->get();
        $ord = count($r);
        $rname = Rooms::where('hotelid', '=', $hid)->pluck('roomname');
        $rnum = Rooms::where('hotelid', '=', $hid)->pluck('room_number');



        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = substr(str_shuffle(str_repeat($pool, 5)), 0, 5)."50";

            $s = Promo::where('hotelid', '=', $hid)->where('status', '=', 1)->get();
        $prcnt = count($s);



        if($prcnt==0){
            $const = "new";
            $r = Rooms::where('hotelid', '=', $hid)->get();
        $ord = count($r);
            return view('pro', compact('const', 'ord', 'rnum', 'code', 'rname'));
        }
        else {
            $const = "add";
            $prid = Promo::where('hotelid', '=', $hid)->where('status', '=', 1)->pluck('roomid');
            $prcode = Promo::where('hotelid', '=', $hid)->where('status', '=', 1)->pluck('promocode');
            $prdis = Promo::where('hotelid', '=', $hid)->where('status', '=', 1)->pluck('discount');

           return view('manpromo', compact('const', 'rnum', 'code', 'rname', 'ord', 'prcnt', 'prcode', 'prdis', 'prid'));
        }



    }

    public function newcoup(Request $input){
        $id = Auth::user()->id;
        $user = User::where('id', '=', $id)->pluck('name');
        $hname = Hotels::where('hotelname', '=', $user)->pluck('hotelname');
        $hid = Hotels::where('hotelname', '=', $hname)->pluck('id');
        $roomn = Str::substr($input->rnme, 0, stripos($input->rnme, "-"));


        $rid = Rooms::where('roomname', '=', $roomn)->pluck('roomid');




        $r = Rooms::where('hotelid', '=', $hid)->get();
    $ord = count($r);
    $rname = Rooms::where('hotelid', '=', $hid)->pluck('roomname');
    $rnum = Rooms::where('hotelid', '=', $hid)->pluck('room_number');



    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = substr(str_shuffle(str_repeat($pool, 5)), 0, 5)."50";

    $s = Promo::where('hotelid', '=', $hid)->where('status', '=', 1)->get();
    $prcnt = count($s);



        Promo::create([
        'promocode' => $input->pcode,
        'hotelid' => $hid[0],
        'roomid' => $roomn,
        'discount' => $input->po,
        'status' => 1,
        'promolimit' => $input->limits,
        ]);

        $const = "add";
        $prid = Promo::where('hotelid', '=', $hid)->where('status', '=', 1)->pluck('roomid');
        $prcode = Promo::where('hotelid', '=', $hid)->where('status', '=', 1)->pluck('promocode');
        $prdis = Promo::where('hotelid', '=', $hid)->where('status', '=', 1)->pluck('discount');


        return view('manpromo', compact('const', 'rnum', 'code', 'rname', 'ord', 'prcnt', 'prcode', 'prdis', 'prid'));
    }
}
