@extends('layouts.settlepayment')

@section('const')

@if($cont == 0)
<div class="py-12">
        <div class="py-12" style="display: inline-flex; width:60%;">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >

                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                   Hotel had not set its Payment Option Yet. Please hold the amount and contact Hotel.
                    </h1>


            </div></div></div>
            @else

            <div class="py-12" style="display: inline-flex; width:60%;">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >


                <div class="mx-5 mt-5" style="float: right; position: relative; margin-left: 5em;">
                    <h4>Hotel Payment Details</h4> <br>
                    <img src="Uploads/{{$hqr[$cont-1]}}" alt="QR">

                    <div class="flex flex-row justify-between items-start mt-4">
                        <div>
                            <p class="font-normal text-s text-gray-800 leading-tight mt-2">Alternate Payment Details</p>
                            <p class="font-normal text-s text-gray-800 leading-tight mt-2">{{$alt[$cont-1]}}
                            </p><br><br>
                            <p class="font-normal text-s text-gray-800 leading-tight mt-2">Amount</p>
                            <p class="font-normal text-s text-gray-800 leading-tight mt-2">P {{$amount[0]}}.00
                            </p><br><br>

                            <p class="font-normal text-s text-gray-800 leading-tight mt-2">Commission</p>
                            <p class="font-normal text-s text-gray-800 leading-tight mt-2">P {{$comms}}.00
                            </p><br><br>

                            <p class="font-normal text-s text-gray-800 leading-tight mt-2">Final Amount to Settle</p>
                            <p class="font-normal text-s text-gray-800 leading-tight mt-2">P {{$setmount}}.00
                            </p><br><br>


                            <a href="settlepay?id={{$refid}}">    <x-jet-button type="submit" class="ml-4">
                    {{ __('Settle') }}
                           </x-jet-button></a>


                        </div>

                    </div>

                </div>
            </div>


@endif

@endsection
