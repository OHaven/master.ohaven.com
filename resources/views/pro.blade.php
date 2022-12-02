@extends('layouts.promo')

@section('new')
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


