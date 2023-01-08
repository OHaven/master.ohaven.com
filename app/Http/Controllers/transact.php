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
use App\Models\Transactions;
use App\Models\rtemp;
use PDF;

class transact extends Controller
{
    public function transact(Request $rq) {

        $roomid = $rq->id;
        $userid = Auth::user()->id;
        $hotelid = $rq->hid;
        $st = $rq->st;
        $et = $rq->et;
        $pr = $rq->pr;
        $hname = Hotels::where('id', '=', $hotelid)->pluck('hotelname');

        $rnm = Rooms::where('roomid', '=', $roomid)->orderBy('roomname', "asc")->pluck('roomname');
        $rnum = Rooms::where('roomid', '=', $roomid)->orderBy('roomname', "asc")->pluck('room_number');
        $price1 = Rooms::where('roomid', '=', $roomid)->orderBy('roomname', "asc")->pluck('pricing');
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $referenceId = substr(str_shuffle(str_repeat($pool, 16)), 0, 16)."50";
        $stat = 0;

        if($st==0 && $et==0 && $pr==0){
        return view('book', compact('pr', 'hname', 'rnm', 'rnum', 'price1', 'roomid', 'userid', 'hotelid', 'referenceId', 'stat', 'st', 'et'));
        }

        else {


            $promos = Promo::where('promocode', '=', $pr)->where('roomid', '=', $rnm)->get();
            $prid = Promo::where('promocode', '=', $pr)->pluck('promoid');

            $couns = count($promos);

            if($couns > 0){
                $limit = Promo::where('promoid', '=', $prid)->pluck('promolimit');
                $disco = Promo::where('promocode', '=', $pr)->pluck('discount');
                $statm = strtotime($st); // or your date as well
                $endt = strtotime($et);
                $datediff = $endt - $statm;

                $diff = intval(round($datediff / (60 * 60 * 24)));

                $pri = $price1[0];
                $amnt = $pri * $diff;
                $disc = $pri * $diff * $disco[0] / 100;
                $amntpay = $amnt - $disc;
                $errorss=0;

                if(intval($limit[0])>0){
                rtemp::create([
                    'promoid' => $prid[0],
                    'hotelid' => $hotelid,
                    'roomid' => $roomid,
                    'userid' => $userid,
                    'referenceId' => $referenceId,
                    'amount' => $amntpay,
                    'stat' => 0,

                ]);
                return view('book', compact('errorss','disco','pr','amnt','amntpay','hname', 'rnm', 'rnum', 'price1', 'roomid', 'userid', 'hotelid', 'referenceId', 'stat', 'st', 'et'));
            }

            else {
                $statm = strtotime($st); // or your date as well
                $endt = strtotime($et);
                $datediff = $endt - $statm;

                $diff = intval(round($datediff / (60 * 60 * 24)));

                $pri = $price1[0];
                $amntpay = $pri * $diff;

                $errorss=0;
                $errorss++;
                return view('book', compact('errorss','pr','amntpay','hname', 'rnm', 'rnum', 'price1', 'roomid', 'userid', 'hotelid', 'referenceId', 'stat', 'st', 'et'));
            }
            }

            elseif($couns==0 && $pr==""){
                $statm = strtotime($st);
                $endt = strtotime($et);
                $datediff = $endt - $statm;

                $diff = intval(round($datediff / (60 * 60 * 24)));

                $pri = $price1[0];
                $amntpay = $pri * $diff;
                $errorss=0;

                rtemp::create([
                    'promoid' => 0,
                    'hotelid' => $hotelid,
                    'roomid' => $roomid,
                    'userid' => $userid,
                    'referenceId' => $referenceId,
                    'amount' => $amntpay,
                    'stat' => 0,

                ]);
                return view('book', compact('errorss', 'pr','amntpay','hname', 'rnm', 'rnum', 'price1', 'roomid', 'userid', 'hotelid', 'referenceId', 'stat', 'st', 'et'));

            }
            else{
                $statm = strtotime($st); // or your date as well
                $endt = strtotime($et);
                $datediff = $endt - $statm;

                $diff = intval(round($datediff / (60 * 60 * 24)));

                $pri = $price1[0];
                $amntpay = $pri * $diff;

                $errorss=0;
                $errorss++;
                return view('book', compact('errorss','pr','amntpay','hname', 'rnm', 'rnum', 'price1', 'roomid', 'userid', 'hotelid', 'referenceId', 'stat', 'st', 'et'));
     } }
    }

    public function reserve(Request $req) {
        $roomid = $req->id;
        $userid = Auth::user()->id;
        $hotelid = $req->hid;
        $refid = $req->refiD;

        $pr = $req->prcode;
        $st = $req->start;
        $end = $req->end;
         $amnt = rtemp::where('referenceId', '=', $refid)->where('status', '=', 0)->pluck('amount');
         $promo = rtemp::where('referenceId', '=', $refid)->where('status', '=', 0)->pluck('promoid');
         $promoid = $promo[0];
         if($promoid==0)
         {
            Rooms::where('roomid', '=', $roomid)->update(['stat' => 0]);

            $statm = strtotime($st); // or your date as well
            $endt = strtotime($end);
            $datediff = $endt - $statm;
            $diff = intval(round($datediff / (60 * 60 * 24)));
            $ban = intval($amnt[0]) * 10/100;

            Transactions::create([
               'userid' => $userid,
               'hotelid' => $hotelid,
               'roomid' => $roomid,
               'promoid' => $promoid,
               'amount' => $amnt[0],
               'start_date' => $st,
               'end_date' => $end,
               'numberofdays' => $diff,
               'ban_amount' => $ban,
               'stat' => 0,
               'referenceid' => $refid,
           ]);

           return redirect()->intended('dashboard');
         }
         else{
         $limit = Promo::where('promoid', '=', $promoid)->pluck('promolimit');
         $voidcode = intval($limit[0])-1;
         Promo::where('promoid', '=', $promoid)->update(['promolimit' => $voidcode]);
         if($voidcode<=0){
            Promo::where('promoid', '=', $promoid)->update(['status' => 0]);
         }

            Rooms::where('roomid', '=', $roomid)->update(['stat' => 0]);

         $statm = strtotime($st); // or your date as well
         $endt = strtotime($end);
         $datediff = $endt - $statm;
         $diff = intval(round($datediff / (60 * 60 * 24)));
         $ban = intval($amnt[0]) * 10/100;

         Transactions::create([
            'userid' => $userid,
            'hotelid' => $hotelid,
            'roomid' => $roomid,
            'promoid' => $promoid,
            'amount' => $amnt[0],
            'start_date' => $st,
            'end_date' => $end,
            'numberofdays' => $diff,
            'ban_amount' => $ban,
            'stat' => 0,
            'referenceid' => $refid,
        ]);

        return redirect()->intended('dashboard');
    }}

    public function printr(Request $r){

            $transid = $r->id;
        $s = Transactions::where('transid', '=', $transid)->pluck('referenceId');
        $amnt = Transactions::where('transid', '=', $transid)->pluck('amount');
        $promo = rtemp::where('referenceId', '=', $s[0])->pluck('promoid')->take(1);
        $promoid = $promo[0];
        $disc = Promo::where('promoid', '=', $promoid)->pluck('discount');

        $r = rtemp::where('referenceId', '=', $s[0])->pluck('roomid')->take(1);
        $r1 = $r[0];
        $room = Rooms::where('roomid', '=', $r1)->pluck('roomname')->take(1);

        $h = rtemp::where('referenceId', '=', $s[0])->pluck('hotelid')->take(1);
        $h1 = $h[0];
        $hotel = Hotels::where('id', '=', $h1)->pluck('hotelname')->take(1);

        $nights = Transactions::where('userid', '=', Auth::user()->id)->pluck('numberofDays');


        $data = compact('s', 'amnt', 'room', 'hotel', 'disc', 'nights');
        view()->share('receipt', $data);
        $pdf = PDF::loadView('receipt', $data);
        return $pdf->download('OhavenReceipt.pdf');
    }

    public function gettransdets(Request $rq){
        $userid = Auth::user()->id;
        $hname = User::where('id', '=', $userid)->pluck('name');
        $hotelid = Hotels::where('hotelname', '=', $hname)->pluck('id');

        $transcounter = Transactions::where('hotelid', '=', $hotelid)->count();
        $u = Transactions::where('hotelid', '=', $hotelid)->pluck('userid');


        $roomid = Transactions::where('hotelid', '=', $hotelid)->pluck('roomid');
        $refid = Transactions::where('hotelid', '=', $hotelid)->pluck('referenceId');



        $st = Transactions::where('hotelid', '=', $hotelid)->pluck('start_date');
        $end = Transactions::where('hotelid', '=', $hotelid)->pluck('end_date');

        $numdays = Transactions::where('hotelid', '=', $hotelid)->pluck('numberofDays');

        $stat = Transactions::where('hotelid', '=', $hotelid)->pluck('status');

        return view('transactions', compact('refid', 'transcounter', 'st', 'end', 'numdays', 'stat'));
    }

    public function retTrans(Request $rq){
        $transactions =Transactions::paginate(8);
        $data = compact('transactions');


    }

    public function canc(Request $rq){
        $refid = $rq->id;
        return view('cancel', compact('refid'));
    }

    public function cancel(Request $rq) {
        $ref = $rq->id;
        Transactions::where('referenceId', '=', $ref)->update([
            'status' => 2,
        ]);
    }
}


