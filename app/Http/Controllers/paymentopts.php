<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;
use App\Models\Hotels;
use App\Models\User;
use App\Models\paymentopt;
use Illuminate\Support\Facades\Auth;

class paymentopts extends Controller
{
    public function getpaymentopt(Request $req){
        $id = Auth::user()->id;
        $hname = User::where('id', '=', $id)->pluck('name');
        $hotelid = Hotels::where('hotelname', '=', $hname)->take(1)->pluck('id');

        $d = paymentopt::all();
        $cont = paymentopt::where('hotelid', '=', $hotelid)->where('stat', '=', 1)->count();

        if($cont==0){
            return view('paymentoption', compact('cont', 'hname'));
        }
        else {
            $qr = paymentopt::where('hotelid', '=', $hotelid)->where('stat', '=', 1)->pluck('qr')->sortByDesc('id');
            $alt = paymentopt::where('hotelid', '=', $hotelid)->where('stat', '=', 1)->pluck('altdets')->sortByDesc('id');
            return view('paymentoption', compact('cont', 'hname', 'qr', 'alt'));
        }

        //
    }

    public function addoption(Request $rq){
        $id = Auth::user()->id;
        $hname = User::where('id', '=', $id)->pluck('name');
        $hotelid = Hotels::where('hotelname', '=', $hname)->take(1)->pluck('hotelname');


        $this->validate($rq, [
            'files' => 'required|image|mimes:jpeg,png,jpg,gif,svg,jfif,webp|max:20480',
        ]);


        $file = $rq->file('files');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('/Uploads'), $filename);

        paymentopt::where('hotelid', '=', $hotelid[0])->delete();

        paymentopt::create([
            'hotelid' => $hotelid[0],
            'qr' => $filename,
            'altdets' => $rq->rd,
            'stat' => 1,
        ]);


        $d = paymentopt::all();
        $cont = paymentopt::where('hotelid', '=', $hotelid)->where('stat', '=', 1)->count();
        $qr = paymentopt::where('hotelid', '=', $hotelid)->where('stat', '=', 1)->pluck('qr')->sortByDesc('id');
        $alt = paymentopt::where('hotelid', '=', $hotelid)->where('stat', '=', 1)->pluck('altdets')->sortByDesc('id');
        $id = paymentopt::where('hotelid', '=', $hotelid)->where('stat', '=', 1)->pluck('id')->sortByDesc('id');
        return view('paymentoption', compact('cont', 'hname', 'qr', 'alt'));

    }
}
