@extends('layouts.booking')

@section('conts')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="py-12" style="display: inline-flex; width:60%;">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >

                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    Reservation
                </h1>

                <div class="mt-4">
                    <x-jet-label for="roomnum" value="{{ __('Room Name: ') }}" />
                    <p class="font-semibold text-s text-gray-800 leading-tight mt-2">{{$rnm[0]}} - {{$rnum[0]}}</p>
                </div>

                <div class="mt-4">
                    <x-jet-label for="pr" value="{{ __('Pricing (per Night)') }}" />
                    <p class="font-semibold text-s text-gray-800 leading-tight mt-2">Php {{$price1[0]}}.00</p>
                </div>


                <div class="mt-4">
                    <x-jet-label for="cap" value="{{ __('Hotel') }}" />
                    <p class="font-semibold text-s text-gray-800 leading-tight mt-2">{{$hname[0]}}</p>
                </div>

                <div class="mt-4">
                    <x-jet-label for="rd" value="{{ __('Reference Id') }}" />
                    <p class="font-semibold text-s text-gray-800 leading-tight mt-2">{{$referenceId}}</p>
                </div>


            </div>

            <div class="max-w-9xl mx-auto sm:px-6 lg:px-8" style="width: 80%; ">

                    <form method="post" action="rserve?refiD={{$referenceId}}&id={{$roomid[0]}}&hid={{$hotelid[0]}}">
                        @csrf


@if($st==0 && $et==0 && $pr==0)
<div class="mt-4">
    <x-jet-label for="prcode" value="{{ __('Enter Promo Code') }}" />
    <x-jet-input id="prcode" class="block mt-1 w-full" type="text" name="prcode"  autofocus/>
</div>
<div class="mt-4">
    <x-jet-label for="start" value="{{ __('Start Date: ') }}" />
    <x-jet-input id="start" class="block mt-1 w-full" type="date" name="start" required/>
</div>

<div class="mt-4">
    <x-jet-label for="end" value="{{ __('End Date: ') }}" />
    <x-jet-input id="end" class="block mt-1 w-full" type="date" name="end" required/>
</div>

@elseif($st==$st && $et==$et && $errorss > 0)
<div class="mt-4">
    <x-jet-label for="prcode" value="{{ __('Enter Promo Code') }}" />
    <x-jet-input id="prcode" class="block mt-1 w-full" type="text" name="prcode"  autofocus/>
    @if ($errorss > 0)
	<div class="alert alert-danger" style="margin: 1em;">
		<strong>Whoops!</strong> Code is not Valid!<br><br>
	</div>
@endif
</div>
<div class="mt-4">
    <x-jet-label for="start" value="{{ __('Start Date: ') }}" />
    <x-jet-input id="start" class="block mt-1 w-full" type="date" name="start" value={{$st}} required/>
</div>

<div class="mt-4">
    <x-jet-label for="end" value="{{ __('End Date: ') }}" />
    <x-jet-input id="end" class="block mt-1 w-full" type="date" value={{$et}} name="end" required/>
</div>

<div class="mt-4">
    <x-jet-label for="amnt" value="{{ __('To Pay: ') }}" />
    <x-jet-input id="topay" disabled class="block mt-1 w-full" type="text" name="topay" value="{{$amntpay}}"/>
</div>

@elseif($st==$st && $et==$et && $pr=="")
<div class="mt-4">
    <x-jet-label for="prcode" value="{{ __('Enter Promo Code') }}" />
    <x-jet-input id="prcode" class="block mt-1 w-full" type="text" name="prcode"  autofocus/>
    @if ($errorss > 0)
	<div class="alert alert-danger" style="margin: 1em;">
		<strong>Whoops!</strong> Code is not Valid!<br><br>
	</div>
@endif
</div>
<div class="mt-4">
    <x-jet-label for="start" value="{{ __('Start Date: ') }}" />
    <x-jet-input id="start" class="block mt-1 w-full" type="date" name="start" value={{$st}} required/>
</div>

<div class="mt-4">
    <x-jet-label for="end" value="{{ __('End Date: ') }}" />
    <x-jet-input id="end" class="block mt-1 w-full" type="date" value={{$et}} name="end" required/>
</div>

<div class="mt-4">
    <x-jet-label for="amnt" value="{{ __('To Pay: ') }}" />
    <x-jet-input id="topay" disabled class="block mt-1 w-full" type="text" name="topay" value="{{$amntpay}}"/>
</div>


@else
<div class="mt-4">
    <x-jet-label for="prcode" value="{{ __('Enter Promo Code') }}" />
    <x-jet-input id="prcode" class="block mt-1 w-full" type="text" name="prcode" value={{$pr}} autofocus/>


</div>
<div class="mt-4">
    <x-jet-label for="start" value="{{ __('Start Date: ') }}" />
    <x-jet-input id="start" class="block mt-1 w-full" type="date" name="start" value={{$st}} required/>
</div>

<div class="mt-4">
    <x-jet-label for="end" value="{{ __('End Date: ') }}" />
    <x-jet-input id="end" class="block mt-1 w-full" type="date" value={{$et}} name="end" required/>
</div>


<div class="mt-4">
    <x-jet-label for="amnt" value="{{ __('Total without Discount: ') }}" />
    <p class="font-normal text-s text-gray-800 leading-tight mt-2">Php {{$amnt}}.00</p>
</div>

<div class="mt-4">
    <x-jet-label for="amnt" value="{{ __('Discount: ') }}" />
    <p class="font-normal text-s text-gray-800 leading-tight mt-2">{{$disco[0]}} %</p>
</div>

<div class="mt-4">
    <x-jet-label for="topay" value="{{ __('To Pay: ') }}" />
    <x-jet-input id="topay" disabled class="block mt-1 w-full" type="text" name="topay" value="{{$amntpay}}"/>
</div>
@endif


                <script>

document.querySelector("#end").addEventListener("change", () => {
    pr = document.querySelector("#prcode").value;
    start = document.querySelector("#start").value;
  end = document.querySelector("#end").value;

  window.location = "book?id={{$roomid}}&hid={{$hotelid}}&st="+start+"&et="+end+"&pr="+pr;
      });


                </script>






                <div class="mx-5 mt-5" style="float: right; position: relative; margin-left: 5em;">
                    <img src="Uploads/30.jpg" alt="QR">

                    <div class="flex flex-row justify-between items-start mt-4">
                        <div>
                            <p class="font-normal text-s text-gray-800 leading-tight mt-2">Send Money via QR in <span style="color: #1730eb">Gcash</span></p><br>
                            <p class="font-normal text-s text-gray-800 leading-tight mt-2">Instructions: <br> <br>
                            1. Login to <span style="color: #1730eb">GCash</span> app <br> <br>
                            2. Send Money <br> <br>
                            3. Select Send Via QR <br> <br>
                            4. Scan QR Code Above <br> <br>
                            5. Input exact amount to pay <br> <br>
                            6. Send reference ID as a message <br> <br>
                            7. Send Amount <br> <br>
                            8. Wait for reservation confirmation
                            </p>
                        </div>

                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button type="submit" class="ml-4">
            {{ __('Reserve') }}
                   </x-jet-button>
               </div>
                </div>


        </form>
            </div>

    </div>
</div></div>

@endsection
