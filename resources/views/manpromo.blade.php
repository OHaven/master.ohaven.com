@extends('layouts.promo')

@section('sidebar')
<div class="py-12" style="display: inline-flex;">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="rounded-lg max-w-lg" style="overflow-y: scroll; height:400px;">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="display:inline-flex;">
            {{ __('Active Promos') }}
        </h2>

        @for($i=0; $i < $prcnt; $i++)
        <div class="container mt-5"> <div class="d-flex justify-content-center row"> <div class="col-md-9"> <div class="coupon p-3 bg-white"> <div class="row no-gutters" style="margin-left:1em;"> <div class="col-md-4 border-right" style="border: dotted 2px black;"> <div class="d-flex flex-column align-items-center" >
           <span class="d-block mt-2" style="margin-top: 1em;">{{$prid[$i]}}</span>
        </div> </div> <div class="col-md-8">
             <div>
                <div class="d-flex flex-row justify-content-end off d-block mt-2"> <h1 >{{$prdis[$i]}}%</h1><span>OFF</span></div> <div class="d-flex flex-row justify-content-between off px-3 p-2 d-block mt-2"><span>Promo code:</span><br><strong style="margin-top: 1em; margin-left: 1em;">{{$prcode[$i]}}</strong></div>
         </div>
        </div>
     </div>
     </div>
     </div>
     </div>
     </div>

     @endfor

</div></div>
@endsection

@section('addpromo')
<div class="py-12" style="display: inline-flex; width:60%;">



    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Promo Code') }}
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
            <form method="POST" action="addcoup"  enctype="multipart/form-data">
                @csrf

                <div>
                    <x-jet-label for="name" value="{{ __('Room Name') }}" />
                    <select class="form-control block mt01" name="rnme">
                        @for($i= 0; $i<$ord; $i++)
                        <option>{{$rname[$i]}}-{{$rnum[$i]}}</option>
                        @endfor
                    </select>
                </div>


                <div class="mt-4">
                    <x-jet-label for="pr" value="{{ __('Percent Off') }}" />
                    <x-jet-input id="pr" class="block mt-1" type="number" name="po" required  style="width: 40em;"/>
                </div>


                <div class="mt-4">
                    <x-jet-label for="cap" value="{{ __('Number of Available uses') }}" />
                    <x-jet-input id="cap" class="block mt-1 w-full" type="number" name="limits" required/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="cap" value="{{ __('Type Custom Promo Code') }}" />
                    <x-jet-input id="cap" class="block mt-1 w-full" type="text" name="pcode" value="{{$code}}" required/>
                </div>


                <x-jet-input id="type" class="block mt-1 w-full" type="text" name="type" value="hotel" required hidden/>


                <div class="flex items-center justify-end mt-4">
                         <x-jet-button class="ml-4">
             {{ __('Create Promo') }}
                    </x-jet-button>
                </div>
            </form>
        </div></div>
@endsection
