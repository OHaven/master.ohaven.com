<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotels;
use App\Models\Rooms;
use App\Models\Transactions;
use App\Models\paymentopt;
use Carbon\Carbon;

class admin extends Controller
{
    public function dash(Request $rq){
        $transcounter = Hotels::where('stat', '=', 0)->count();
        $hotel = Hotels::where('stat', '=', 0)->pluck('hotelname');
        $loc = Hotels::where('stat', '=', 0)->pluck('loc');
        $stat = Hotels::where('stat', '=', 0)->pluck('stat');
        $hotelid = Hotels::where('stat', '=', 0)->pluck('id');
        return view('admindash', compact('hotel', 'loc', 'transcounter', 'stat', 'hotelid'));
    }

   public function delete (Request $rq){
        $id = $rq->id;

        Hotels::where('id', '=', $id)->update(['stat'=> 2]);
        $transcounter = Hotels::where('stat', '=', 0)->count();
        $hotel = Hotels::where('stat', '=', 0)->pluck('hotelname');
        $loc = Hotels::where('stat', '=', 0)->pluck('loc');
        $stat = Hotels::where('stat', '=', 0)->pluck('stat');
        $hotelid = Hotels::where('stat', '=', 0)->pluck('id');
        return view('admindash', compact('hotel', 'loc', 'transcounter', 'stat', 'hotelid'));

    }

   public function accept (Request $rq){
        $id = $rq->id;

        Hotels::where('id', '=', $id)->update(['stat'=> 1]);
        $transcounter = Hotels::where('stat', '=', 0)->count();
        $hotel = Hotels::where('stat', '=', 0)->pluck('hotelname');
        $loc = Hotels::where('stat', '=', 0)->pluck('loc');
        $stat = Hotels::where('stat', '=', 0)->pluck('stat');
        $hotelid = Hotels::where('stat', '=', 0)->pluck('id');
        return view('admindash', compact('hotel', 'loc', 'transcounter', 'stat', 'hotelid'));

    }

    public function paytable(Request $rq){
        $paydets = paymentopt::where('stat', '=', 1)->pluck('hotelid');
        $cnter = paymentopt::where('stat', '=', 1)->count();

       return view('hotelpay', compact('paydets', 'cnter'));
    }

    public function paytableskey(Request $rq){
        $skey = $rq->skey;
        $paydets = paymentopt::where('stat', '=', 1)->where('hotelid', '=', $skey)->pluck('hotelid');
        $cnter = paymentopt::where('stat', '=', 1)->where('hotelid', '=', $skey)->count();

       return view('hotelpay', compact('paydets', 'cnter'));
    }

    public function vdets(Request $rq){
        $name = $rq->hotel;
        $hname = paymentopt::where('hotelid', '=', $name)->pluck('hotelid');
        $qr = paymentopt::where('hotelid', '=', $name)->pluck('qr');
        $alt = paymentopt::where('hotelid', '=', $name)->pluck('altdets');
        $cont = paymentopt::where('hotelid', '=', $name)->count();

        return view('vdets', compact('hname', 'qr', 'alt', 'cont'));
    }

    public function gettransdets(Request $r){


        $transcounter = Transactions::where('status', '=', 0)->count();
        $u = Transactions::where('status', '=', 0)->pluck('userid');


        $roomid = Transactions::where('status', '=', 0)->pluck('roomid');
        $refid = Transactions::where('status', '=', 0)->pluck('referenceId');
        $amnt = Transactions::where('status', '=', 0)->pluck('amount');



        $st = Transactions::where('status', '=', 0)->pluck('start_date');
        $end = Transactions::where('status', '=', 0)->pluck('end_date');

        $numdays = Transactions::where('status', '=', 0)->pluck('numberofDays');

        $stat = Transactions::where('status', '=', 0)->pluck('status');

        return view('adtrans', compact('refid', 'transcounter', 'st', 'end', 'numdays', 'stat', 'amnt'));
    }

    public function acceptres(Request $rq){
        $refid = $rq->id;
        Transactions::where('referenceId', '=', $refid)->update([
            'status' => 1
        ]);

        return redirect()->route('adres');
    }

    public function reskey(Request $rq) {
        $refid = $rq->skey;
        $transcounter = Transactions::where('status', '=', 0)->where('referenceId','=', $refid)->count();
        $u = Transactions::where('status', '=', 0)->where('referenceId','=', $refid)->pluck('userid');


        $roomid = Transactions::where('status', '=', 0)->where('referenceId','=', $refid)->pluck('roomid');
        $refid = Transactions::where('status', '=', 0)->where('referenceId','=', $refid)->pluck('referenceId');



        $st = Transactions::where('status', '=', 0)->where('referenceId','=', $refid)->pluck('start_date');
        $end = Transactions::where('status', '=', 0)->where('referenceId','=', $refid)->pluck('end_date');

        $numdays = Transactions::where('status', '=', 0)->where('referenceId','=', $refid)->pluck('numberofDays');

        $stat = Transactions::where('status', '=', 0)->where('referenceId','=', $refid)->pluck('status');

        return view('adtrans', compact('refid', 'transcounter', 'st', 'end', 'numdays', 'stat'));
    }

    public function settlement(Request $r){
        $transcounter = Transactions::where('status', '=', 1)->orWhere('status', '=', 2)->count();
        $u = Transactions::where('status', '=', 1)->orWhere('status', '=', 2)->pluck('userid');


        $roomid = Transactions::where('status', '=', 1)->orWhere('status', '=', 2)->pluck('roomid');
        $refid = Transactions::where('status', '=', 1)->orWhere('status', '=', 2)->pluck('referenceId');



        $st = Transactions::where('status', '=', 1)->orWhere('status', '=', 2)->pluck('start_date');
        $end = Transactions::where('status', '=', 1)->orWhere('status', '=', 2)->pluck('end_date');

        $numdays = Transactions::where('status', '=', 1)->orWhere('status', '=', 2)->pluck('numberofDays');

        $stat = Transactions::where('status', '=', 1)->orWhere('status', '=', 2)->pluck('status');

        return view('sett', compact('refid', 'transcounter', 'st', 'end', 'numdays', 'stat'));
    }

    public function settle(Request $rq){
        $refid = $rq->id;
        $cnt = Transactions::where('referenceId', '=', $refid)->count();
        $ban_amount = Transactions::where('referenceId', '=', $refid)->pluck('ban_amount');
        $amount = Transactions::where('referenceId', '=', $refid)->pluck('amount');
        $hotelid = Transactions::where('referenceId', '=', $refid)->pluck('hotelid');
        $stat = Transactions::where('referenceId', '=', $refid)->pluck('status');
        $hname = Hotels::where('id', '=', $hotelid)->pluck('hotelname');
        $cont = paymentopt::where('hotelid', '=', $hname)->where('stat', '=', 1)->count();
        $payid = paymentopt::where('hotelid', '=', $hname)->count();
        $hqr = paymentopt::where('hotelid', '=', $hname)->where('stat', '=', 1)->pluck('qr');
        $alt = paymentopt::where('hotelid', '=', $hname)->where('stat', '=', 1)->pluck('altdets');


        if($stat[0]==1){
        $comms = $amount[0] * 0.02;
        $setmount = $amount[0] - $comms;
        }
        elseif($stat[0]==2){
            $comms = $ban_amount[0] * 0.02;
        $setmount = $ban_amount[0] - $comms;
        }

          return view('settlepay', compact('setmount','comms','ban_amount', 'hotelid', 'refid', 'amount', 'stat', 'hname', 'cont', 'payid', 'hqr', 'alt'));
    }

    public function setssle(Request $rq){
        $refid = $rq->id;
        Transactions::where('referenceId', '=', $refid)->update([
            'status' => 3,
            'sett_stat' => 1,
        ]);
        return redirect()->route('sett');
    }

}
