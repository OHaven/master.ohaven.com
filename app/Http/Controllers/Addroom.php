<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;
use App\Models\Hotels;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class Addroom extends Controller
{
    public function addroom(Request $request) {

        $this->validate($request, [
            'files' => 'required|image|mimes:jpeg,png,jpg,gif,svg,jfif,webp|max:20480',
        ]);


        $file = $request->file('files');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('/Uploads'), $filename);

        $hname = User::where('id', '=', Auth::user()->id)->pluck('name');
        $hid = Hotels::where('hotelname', '=', $hname[0])->pluck('id');


        Rooms::create([
        'hotelid' => $hid[0],
        'room_number' => $request->get('roomnum'),
       'roomname' => $request->get('name'),
       'pricing' => $request->get('pr'),
       'cap' => $request->get('cap'),
       'desc' => $request->get('rd'),
        'roomph' => $filename,
        ]);

        return redirect()->intended('retroom');


    }

    public function editroom(Request $request) {
        $r = Rooms::where('roomid', '=', $request->id);
        $ord= 1;
        $price = Rooms::where('roomid', '=', $request->id)->pluck('pricing');
        $cap = Rooms::where('roomid', '=', $request->id)->pluck('cap');
        $name = Rooms::where('roomid', '=', $request->id)->pluck('roomname');
        $descs = Rooms::where('roomid', '=', $request->id)->pluck('desc');
        $php = Rooms::where('roomid', '=', $request->id)->pluck('roomph');
        $ids = Rooms::where('roomid', '=', $request->id)->pluck('roomid');

        // dd($desc);
        return view('htelrooms', compact('r','ord', 'name', 'price','descs', 'cap','php', 'ids'));
    }

    public function upRoom(Request $request) {


        $this->validate($request, [
            'files' => 'required|image|mimes:jpeg,png,jpg,gif,svg,jfif,webp|max:20480',
        ]);


        $file = $request->file('files');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('/Uploads'), $filename);

        $hname = User::where('id', '=', Auth::user()->id)->pluck('name');
        $hid = Hotels::where('hotelname', '=', $hname[0])->pluck('id');


        Rooms::where('roomid', '=', $request->id)->update([
        'hotelid' => $hid[0],
        'room_number' => $request->get('roomnum'),
       'roomname' => $request->get('name'),
       'pricing' => $request->get('pr'),
       'cap' => $request->get('cap'),
       'desc' => $request->get('rd'),
        'roomph' => $filename,
        ]);

        return redirect()->intended('retroom');
    }

    public function delete(Request $req){
        $flight = Rooms::where('roomid', '=', $req->id)->delete();
        return redirect()->intended('retroom');
    }
}
