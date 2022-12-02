<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Hotels;
use App\Models\Rooms;

class GetLocation extends Controller
{



    public function retLoc(Request $req) {
        $ip = request()->header('X-Forwarded-For');
        if ($position = Location::get($ip)) {
            $user = Auth::user();

            if(strcmp($user->type, "user")){
                return redirect()->intended('htledash');
            }

            if(strcmp($user->type, "hotel")){
                //dd(compact('position'));

                //get hotels near me
                $location = $position->cityName.','.$position->regionName;

                $loc = Hotels::all()->pluck('loc');


                $cnter = count($loc);

                for($i=0; $i < $cnter; $i++){
                    $city = Str::contains($loc[$i], $position->cityName, $caseSensitive=true);
                    $rgion = Str::contains($loc[$i], Str::substr($position->regionName, stripos($position->regionName, "of")+3), $caseSensitive = true);

                                 if($rgion || $city){
                                    $regional = Str::substr($position->regionName, stripos($position->regionName, "of")+3);

                                    $c = Hotels::where(DB::raw('lower(loc)'), 'LIKE', '%'.strtolower($regional).'%')->orWhere(DB::raw('lower(loc)'), 'LIKE', '%'.strtolower($position->cityName).'%')->get();
                                    $counter = count($c);
                                    $loc = Hotels::where(DB::raw('lower(loc)'), 'LIKE', '%'.strtolower($regional).'%')->orWhere(DB::raw('lower(loc)'), 'LIKE', '%'.strtolower($position->cityName).'%')->take(6)->pluck('loc')->sortByDesc('rating');
                        $hname = Hotels::where(DB::raw('lower(loc)'), 'LIKE', '%'.strtolower($regional).'%')->orWhere(DB::raw('lower(loc)'), 'LIKE', '%'.strtolower($position->cityName).'%')->take(6)->pluck('hotelname')->sortByDesc('rating');
                        $near = Hotels::where(DB::raw('lower(loc)'), 'LIKE', '%'.strtolower($regional).'%')->orWhere(DB::raw('lower(loc)'), 'LIKE', '%'.strtolower($position->cityName).'%')->take(6)->pluck('rating')->sortByDesc('rating');
                        $pfp = Hotels::where(DB::raw('lower(loc)'), 'LIKE', '%'.strtolower($regional).'%')->orWhere(DB::raw('lower(loc)'), 'LIKE', '%'.strtolower($position->cityName).'%')->take(6)->pluck('pfp')->sortByDesc('rating');
                        $rating = Hotels::where(DB::raw('lower(loc)'), 'LIKE', '%'.strtolower($regional).'%')->orWhere(DB::raw('lower(loc)'), 'LIKE', '%'.strtolower($position->cityName).'%')->take(6)->pluck('rating')->sortByDesc('rating');
                        $ids = Hotels::where(DB::raw('lower(loc)'), 'LIKE', '%'.strtolower($regional).'%')->orWhere(DB::raw('lower(loc)'), 'LIKE', '%'.strtolower($position->cityName).'%')->take(6)->pluck('id')->sortByDesc('rating');
                        return view('dashboard', compact('ids','near', 'hname', 'loc', 'counter', 'pfp', 'rating'));
                    }

                    else {
                        // $regional = Str::substr($position->regionName, stripos($position->regionName, "of")+3);
                        // $c = Hotels::where(DB::raw('lower(loc)'), 'LIKE', '%'.strtolower($regional).'%')->orWhere(DB::raw('lower(loc)'), 'LIKE', '%'.strtolower($position->cityName).'%')->get();
                        //             $counter = count($c);
                        //             $hname = Hotels::where(DB::raw('lower(loc)'), 'LIKE', '%'.strtolower($regional).'%')->orWhere(DB::raw('lower(loc)'), 'LIKE', '%'.strtolower($position->cityName).'%')->take(6)->pluck('hotelname')->sortByDesc('rating');
                        //             $ster = Hotels::where(DB::raw('lower(loc)'), 'LIKE', '%'.strtolower($regional).'%')->orWhere(DB::raw('lower(loc)'), 'LIKE', '%'.strtolower($position->cityName).'%')->take(6)->pluck('rating')->sortByDesc('rating');
                        //             $pfp = Hotels::where(DB::raw('lower(loc)'), 'LIKE', '%'.strtolower($regional).'%')->orWhere(DB::raw('lower(loc)'), 'LIKE', '%'.strtolower($position->cityName).'%')->take(6)->pluck('pfp')->sortByDesc('rating');
                        //             $rating = Hotels::where(DB::raw('lower(loc)'), 'LIKE', '%'.strtolower($regional).'%')->orWhere(DB::raw('lower(loc)'), 'LIKE', '%'.strtolower($position->cityName).'%')->take(6)->pluck('rating')->sortByDesc('rating');
                        $near = "No Hotels found near you.";
                        $counter = 0;
                         return view('dashboard', compact('near', 'counter'));
                    }

                }

                // // for()




                // // for($i=0; $i <= $loc; $i++){
                // //     // $exdress = explode(',', $loc);
                // //      dd($exdress);
                // // }


                // return view('dashboard', compact('position'));
            }
        }
         else {

        }









    }

    public function passloc(){
        $ip = request()->header('X-Forwarded-For');
        if ($position = Location::get($ip)) {
            $lati = $position->latitude;
            $longi = $position->longitude;
            $location = $position->cityName.','.$position->regionName;

            $loc = Hotels::all()->pluck('loc');


            $cnter = count($loc);

            for($i=0; $i < $cnter; $i++){

                                $regional = Str::substr($position->regionName, stripos($position->regionName, "of")+3);

                                $c = Hotels::all();
                                $counter = count($c);
                                $loc = Hotels::all()->take(6)->pluck('loc')->sortByDesc('rating');
                    $hname = Hotels::all()->take(6)->pluck('hotelname')->sortByDesc('rating');
                    $near = Hotels::all()->take(6)->pluck('rating')->sortByDesc('rating');
                    $pfp = Hotels::all()->take(6)->pluck('pfp')->sortByDesc('rating');
                    $rating = Hotels::all()->take(6)->pluck('rating')->sortByDesc('rating');
                    $ids = Hotels::all()->take(6)->pluck('id')->sortByDesc('rating');
                    return view('findhotel', compact('lati', 'longi', 'hname', 'near', 'pfp', 'rating', 'counter', 'ids'));

        }}

    }

    public function htails(Request $rq){
        //hotel
            $hid = (string)$rq->hid;
            $ids = (string)$rq->id;

            $hname = Hotels::where('id', '=', $hid)->pluck('hotelname');
            $pfp = Hotels::where('id', '=', $hid)->pluck('pfp');
            $rating = Hotels::where('id', '=', $hid)->pluck('rating');
            $loc = Hotels::where('id', '=', $hid)->pluck('loc');

        //rooms
        $r = Rooms::where('hotelid', '=', $hid)->where('stat', '=', 1)->get();
        $ords = count($r);
        $price = Rooms::where('hotelid', '=', $hid)->where('stat', '=', 1)->orderBy('roomname', "asc")->pluck('pricing');
        $cap = Rooms::where('hotelid', '=', $hid)->where('stat', '=', 1)->orderBy('roomname', "asc")->pluck('cap');
        $name = Rooms::where('hotelid', '=', $hid)->where('stat', '=', 1)->orderBy('roomname', "asc")->pluck('roomname');
        $php = Rooms::where('hotelid', '=', $hid)->where('stat', '=', 1)->orderBy('roomname', "asc")->pluck('roomph');
        $idss = Rooms::where('hotelid', '=', $hid)->where('stat', '=', 1)->orderBy('roomname', "asc")->pluck('roomid');


        if($ids==0){
            $php1 = Rooms::where('hotelid', '=', $hid)->orderBy('roomid', "asc")->pluck('roomph');
        $price1 = Rooms::where('roomid', '=', $hid)->orderBy('roomid', "asc")->pluck('pricing');
        $cap1 = Rooms::where('roomid', '=', $hid)->orderBy('roomid', "asc")->pluck('cap');
        $name1 = Rooms::where('roomid', '=', $hid)->orderBy('roomid', "asc")->pluck('roomname');
        $rnm = Rooms::where('roomid', '=', $hid)->orderBy('roomid', "asc")->pluck('room_number');
        $desc = Rooms::where('roomid', '=', $hid)->orderBy('roomid', "asc")->pluck('desc');
        return view('userhotelrooms', compact('idss','desc','rnm','hid', 'hname', 'pfp', 'rating', 'loc', 'ords', 'price', 'cap', 'name', 'php', 'ids' , 'price1', 'cap1', 'name1', 'php1'));
        }

        else{
        $php1 = Rooms::where('roomid', '=', $ids)->orderBy('roomname', "asc")->pluck('roomph');
        $price1 = Rooms::where('roomid', '=', $ids)->orderBy('roomname', "asc")->pluck('pricing');
        $cap1 = Rooms::where('roomid', '=', $ids)->orderBy('roomname', "asc")->pluck('cap');
        $name1 = Rooms::where('roomid', '=', $ids)->orderBy('roomname', "asc")->pluck('roomname');
        $rnm = Rooms::where('roomid', '=', $ids)->orderBy('roomname', "asc")->pluck('room_number');
        $desc = Rooms::where('roomid', '=', $ids)->orderBy('roomname', "asc")->pluck('desc');

    //dd(compact('ids'));
       return view('userhotelrooms', compact('idss','desc','rnm','hid', 'hname', 'pfp', 'rating', 'loc', 'ords', 'price', 'cap', 'name', 'php', 'ids' , 'price1', 'cap1', 'name1', 'php1'));
        }
    }

    public function viewallroom(Request $rq){

       $id = $rq->hid;
        $hname = Hotels::where('id', '=', $id)->pluck('hotelname');
        $hid = Hotels::where('hotelname', '=', $hname)->pluck('id');

        $r = Rooms::where('hotelid', '=', $hid)->get();
        $ord = count($r);
        $ords = count($r);
        $price = Rooms::where('hotelid', '=', $hid)->where('stat', '=', 1)->orderBy('roomname', "asc")->pluck('pricing');
        $cap = Rooms::where('hotelid', '=', $hid)->where('stat', '=', 1)->orderBy('roomname', "asc")->pluck('cap');
        $name = Rooms::where('hotelid', '=', $hid)->where('stat', '=', 1)->orderBy('roomname', "asc")->pluck('roomname');
        $php = Rooms::where('hotelid', '=', $hid)->where('stat', '=', 1)->orderBy('roomname', "asc")->pluck('roomph');
        $ids = Rooms::where('hotelid', '=', $hid)->where('stat', '=', 1)->orderBy('roomname', "asc")->pluck('roomid');
        return view('showrooms', compact('ords','r','ord', 'name', 'price', 'cap','php', 'ids', 'hid'));
    }


    public function sortbyprice(Request $rq){

        $id = $rq->hid;
         $hname = Hotels::where('id', '=', $id)->pluck('hotelname');
         $hid = Hotels::where('hotelname', '=', $hname)->pluck('id');

         $r = Rooms::where('hotelid', '=', $hid)->get();
         $ord = count($r);
         $ords = count($r);
         $price = Rooms::where('hotelid', '=', $hid)->where('stat', '=', 1)->orderBy('pricing', "asc")->pluck('pricing');
         $cap = Rooms::where('hotelid', '=', $hid)->where('stat', '=', 1)->orderBy('pricing', "asc")->pluck('cap');
         $name = Rooms::where('hotelid', '=', $hid)->where('stat', '=', 1)->orderBy('pricing', "asc")->pluck('roomname');
         $php = Rooms::where('hotelid', '=', $hid)->where('stat', '=', 1)->orderBy('pricing', "asc")->pluck('roomph');
         $ids = Rooms::where('hotelid', '=', $hid)->where('stat', '=', 1)->orderBy('pricing', "asc")->pluck('roomid');
         return view('showrooms', compact('ords','r','ord', 'name', 'price', 'cap','php', 'ids', 'hid'));
     }

     public function sortbycap(Request $rq){

        $id = $rq->hid;
         $hname = Hotels::where('id', '=', $id)->pluck('hotelname');
         $hid = Hotels::where('hotelname', '=', $hname)->pluck('id');

         $r = Rooms::where('hotelid', '=', $hid)->get();
         $ord = count($r);
         $ords = count($r);
         $price = Rooms::where('hotelid', '=', $hid)->where('stat', '=', 1)->orderBy('cap', "asc")->pluck('pricing');
         $cap = Rooms::where('hotelid', '=', $hid)->where('stat', '=', 1)->orderBy('cap', "asc")->pluck('cap');
         $name = Rooms::where('hotelid', '=', $hid)->where('stat', '=', 1)->orderBy('cap', "asc")->pluck('roomname');
         $php = Rooms::where('hotelid', '=', $hid)->where('stat', '=', 1)->orderBy('cap', "asc")->pluck('roomph');
         $ids = Rooms::where('hotelid', '=', $hid)->where('stat', '=', 1)->orderBy('cap', "asc")->pluck('roomid');
         return view('showrooms', compact('ords','r','ord', 'name', 'price', 'cap','php', 'ids', 'hid'));
     }

     public function searchbyname(Request $rq){

        $skey = $rq->skey;
        $id = $rq->hid;
         $hname = Hotels::where('id', '=', $id)->pluck('hotelname');
         $hid = Hotels::where('hotelname', '=', $hname)->pluck('id');

         $r = Rooms::where('hotelid', '=', $hid)->where(DB::raw('lower(roomname)'), 'LIKE', '%'.strtolower($skey).'%')->get();
         $ord = count($r);
         $ords = count($r);
         $price = Rooms::where('hotelid', '=', $hid)->where('stat', '=', 1)->where(DB::raw('lower(roomname)'), 'LIKE', '%'.strtolower($skey).'%')->orderBy('cap', "asc")->pluck('pricing');
         $cap = Rooms::where('hotelid', '=', $hid)->where('stat', '=', 1)->where(DB::raw('lower(roomname)'), 'LIKE', '%'.strtolower($skey).'%')->orderBy('cap', "asc")->pluck('cap');
         $name = Rooms::where('hotelid', '=', $hid)->where('stat', '=', 1)->where(DB::raw('lower(roomname)'), 'LIKE', '%'.strtolower($skey).'%')->orderBy('cap', "asc")->pluck('roomname');
         $php = Rooms::where('hotelid', '=', $hid)->where('stat', '=', 1)->where(DB::raw('lower(roomname)'), 'LIKE', '%'.strtolower($skey).'%')->orderBy('cap', "asc")->pluck('roomph');
         $ids = Rooms::where('hotelid', '=', $hid)->where('stat', '=', 1)->where(DB::raw('lower(roomname)'), 'LIKE', '%'.strtolower($skey).'%')->orderBy('cap', "asc")->pluck('roomid');
         return view('showrooms', compact('ords','r','ord', 'name', 'price', 'cap','php', 'ids', 'hid'));
     }




}
