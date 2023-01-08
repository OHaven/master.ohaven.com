@extends('layouts.vdets')

@section('const')

@if($cont == 0)
<div class="py-12">
        <div class="py-12" style="display: inline-flex; width:60%;">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >

                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    No Payment Option Set. Please Contact Hotel.
                </h1>
            </div></div></div>


            @else

            <div class="py-12" style="display: inline-flex; width:60%;">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >

                    <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{$hname[0]}}'s Payment Details
                    </h1>
    <form method="POST" enctype="multipart/form-data" action="addpopt">
        @csrf
                    <div class="mt-4">
                        <x-jet-label for="rd" value="{{ __('Alternative Payment Details') }}" />
                        <textarea id="rd" class="block mt-1 w-full" name="rd" disabled>{{$alt[$cont-1]}}</textarea>
                    </div>









                </div>


                <div class="mx-5 mt-5" style="float: right; position: relative; margin-left: 5em;">
                    <img src="Uploads/{{$qr[$cont-1]}}" alt="QR">

                </div>
            </div>


@endif

@endsection
