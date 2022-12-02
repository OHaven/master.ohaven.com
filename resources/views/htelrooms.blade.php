@extends('layouts.managerooms')

@section('new')
<div class="py-12" style="display: inline-flex; width:60%;">



    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Room') }}
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
            <form method="POST" action="addroom"  enctype="multipart/form-data">
                @csrf

                <div>
                    <x-jet-label for="name" value="{{ __('Room Name') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="roomnum" value="{{ __('Room Number') }}" />
                    <x-jet-input id="roomnum" class="block mt-1 w-full" type="number" name="roomnum" required/>
                </div>
 
                <div class="mt-4">
                    <x-jet-label for="pr" value="{{ __('Pricing (per Night)') }}" />
                    <x-jet-input id="pr" class="block mt-1" type="number" name="pr" required  style="width: 40em;"/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="cap" value="{{ __('Room Capacity') }}" />
                    <x-jet-input id="cap" class="block mt-1 w-full" type="number" name="cap" required/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="rd" value="{{ __('Room Description') }}" />
                    <textarea id="rd" class="block mt-1 w-full" name="rd" required></textarea>
                </div>

                <div class="mt-4">
                    <x-jet-label for="files" value="{{ __('Add Photo') }}" />
                    <x-jet-input id="files" class="block mt-1 w-full" type="file" name="files" required style="background-color: white;"/>
                </div>

                <x-jet-input id="type" class="block mt-1 w-full" type="text" name="type" value="hotel" required hidden/>


                <div class="flex items-center justify-end mt-4">
                         <x-jet-button class="ml-4">
             {{ __('Add Room') }}
                    </x-jet-button>
                </div>
            </form>
        </div></div>
@endsection

@section('rooms')
<div class="py-12" style="display: inline-flex;">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="rounded-lg max-w-lg" style="overflow-y: scroll; height:400px;">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="display:inline-flex;">
            {{ __('Latest Additions') }}
        </h2>
        <a href="allrooms" class="text-sm text-gray-800 leading-tight" style="display:inline-flex; float: right; margin-right: 3.5em;"><p>See All Rooms</p></a>


        @for ($i=0; $i < $ord; $i++)
        <a href="editroom?id={{$ids[$i]}}">
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

@section('add')
<div class="py-12" style="display: inline-flex; width:60%;">



    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Room') }}
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
            <form method="POST" action="addroom"  enctype="multipart/form-data">
                @csrf

                <div>
                    <x-jet-label for="name" value="{{ __('Room Name') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="roomnum" value="{{ __('Room Number') }}" />
                    <x-jet-input id="roomnum" class="block mt-1 w-full" type="number" name="roomnum" required/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="pr" value="{{ __('Pricing (per Night)') }}" />
                    <x-jet-input id="pr" class="block mt-1" type="number" name="pr" required  style="width: 40em;"/>
                </div>


                <div class="mt-4">
                    <x-jet-label for="cap" value="{{ __('Room Capacity') }}" />
                    <x-jet-input id="cap" class="block mt-1 w-full" type="number" name="cap" required/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="rd" value="{{ __('Room Description') }}" />
                    <textarea id="rd" class="block mt-1 w-full" name="rd" required></textarea>
                </div>

                <div class="mt-4">
                    <x-jet-label for="files" value="{{ __('Add Photo') }}" />
                    <x-jet-input id="files" class="block mt-1 w-full" type="file" name="files" required style="background-color: white;"/>
                </div>

                <x-jet-input id="type" class="block mt-1 w-full" type="text" name="type" value="hotel" required hidden/>


                <div class="flex items-center justify-end mt-4">
                         <x-jet-button class="ml-4">
             {{ __('Add Room') }}
                    </x-jet-button>
                </div>
            </form>
        </div></div>
@endsection


@section('edit')
<div class="py-12" style="display: inline-flex; width:60%;">



    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Room') }}
        </h2>
        <a href="delete?id={{$ids[0]}}" class="text-sm text-gray-800 leading-tight" style="display:inline-flex; float: right; margin-right: 3.5em;"><p>Delete</p></a><br>
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
            <form method="POST" action="updateroom?id={{$ids[0]}}"  enctype="multipart/form-data">
                @csrf

                <div>
                    <x-jet-label for="name" value="{{ __('Room Name') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$name[0]}}" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="roomnum" value="{{ __('Room Number') }}" />
                    <x-jet-input id="roomnum" class="block mt-1 w-full" type="number" name="roomnum" required/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="pr" value="{{ __('Pricing (per Night)') }}" />
                    <x-jet-input id="pr" class="block mt-1" type="number" value="{{$price[0]}}" name="pr" required  style="width: 40em;"/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="cap" value="{{ __('Room Capacity') }}" />
                    <x-jet-input id="cap" class="block mt-1 w-full" type="number" value="{{$cap[0]}}" name="cap" required/>
                </div>

                <div class="mt-4">
                    <x-jet-label for="rd" value="{{ __('Room Description') }}" />
                    <textarea id="rd" class="block mt-1 w-full" name="rd" required>{{$descs[0]}}</textarea>
                </div>

                <div class="mt-4">
                    <x-jet-label for="files" value="{{ __('Add Photo') }}" />
                    <x-jet-input id="files" class="block mt-1 w-full" type="file" name="files" required style="background-color: white;"/>
                </div>

                <x-jet-input id="type" class="block mt-1 w-full" type="text" name="type" value="hotel" required hidden/>


                <div class="flex items-center justify-end mt-4">
                         <x-jet-button class="ml-4">
             {{ __('Update Room') }}
                    </x-jet-button>
                </div>
            </form>
        </div></div>
@endsection