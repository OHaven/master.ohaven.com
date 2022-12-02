@extends('layouts.userrooms')

@section('rooms')
<div class="py-12 " style="display: inline-flex;" >
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 " >
        <div class="rounded-lg max-w-lg overflow-auto" style="overflow-y: scroll; height:400px;">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="display:inline-flex;">
            {{ __('Browse Rooms') }}
        </h2>
        <a href="viewallrooms?hid={{$hid[0]}}" class="text-sm text-gray-800 leading-tight" style="display:inline-flex; float: right; margin-right: 3.5em;"><p>See All Rooms</p></a>


        @for ($i=0; $i < $ords; $i++)
        <a href="uhrooms?id={{$idss[$i]}}&hid={{$hid[0]}}">
<div class="mx-5 mt-5">
    <img class="rounded-lg bg-cover" src="Uploads/{{$php[$i]}}" alt="" >
    <div class="flex flex-row justify-between items-start mt-4">
        <div>
            <p class="text-sm text-gray-800 font-bold">{{$name[$i]}}</p>
            <p class="text-sm text-gray-800">{{$cap[$i]}} person capacity</p>
            <p class="text-sm text-gray-800 mt-2"> <strong>{{$price[$i]}}</strong> per night</p>
        </div>

    </div>
</div></a>
@endfor


</div></div>
@endsection

@section('roomdets')
<div class="py-12" style="display: inline-flex; width:60%;">



<div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
   {{$name1[0]}}
    </h2><br>
    <br>

    @if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> File type not accepted.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

            @csrf


            <div>
                <x-jet-label for="roomnum" value="{{ __('Room Number: ') }}" />
                <p class="font-semibold text-s text-gray-800 leading-tight mt-2">{{$rnm[0]}}</p>
            </div>

            <div class="mt-4">
                <x-jet-label for="pr" value="{{ __('Pricing (per Night)') }}" />
                <p class="font-semibold text-s text-gray-800 leading-tight mt-2">Php {{$price1[0]}}.00</p>
            </div>


            <div class="mt-4">
                <x-jet-label for="cap" value="{{ __('Room Capacity') }}" />
                <p class="font-semibold text-s text-gray-800 leading-tight mt-2">{{$cap1[0]}} person max</p>
            </div>

            <div class="mt-4">
                <x-jet-label for="rd" value="{{ __('Room Description') }}" />
                <p class="font-semibold text-s text-gray-800 leading-tight mt-2">{{$desc[0]}}</p>
            </div>

            <div class="mt-4">
            <img class="rounded-lg bg-cover" src="Uploads/{{$php1[0]}}" alt="" >

            </div>


            <div class="flex items-center justify-end mt-4">
            <x-jet-button class="ml-4">
             {{ __('Book') }}
                    </x-jet-button>
            </div>

    </div></div>
@endsection
