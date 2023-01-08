@extends('layouts.paymentoption')

@section('const')

@if($cont == 0)
<div class="py-12">
        <div class="py-12" style="display: inline-flex; width:60%;">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >

                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    Change Payment Options
                </h1>
<form method="POST" enctype="multipart/form-data" action="addpopt">
    @csrf
                <div class="mt-4">
                    <x-jet-label for="rd" value="{{ __('Alternative Payment Details') }}" />
                    <textarea id="rd" class="block mt-1 w-full" name="rd" required></textarea>
                </div>

                <div class="mt-4">
                    <x-jet-label for="files" value="{{ __('Upload Gcash QR') }}" />
                    <x-jet-input id="files" class="block mt-1 w-full" type="file" name="files" required style="background-color: white;"/>
                </div>
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

                <x-jet-input id="type" class="block mt-1 w-full" type="text" name="type" value="hotel" required hidden/>


                <div class="flex items-center justify-end mt-4">
                   <x-jet-button class="ml-4">
             {{ __('Add Payment Option') }}
                    </x-jet-button>
                </div>
            </form>


            </div></div></div>
            @else

            <div class="py-12" style="display: inline-flex; width:60%;">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >

                    <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                        Change Payment Options
                    </h1>
    <form method="POST" enctype="multipart/form-data" action="addpopt">
        @csrf
                    <div class="mt-4">
                        <x-jet-label for="rd" value="{{ __('Alternative Payment Details') }}" />
                        <textarea id="rd" class="block mt-1 w-full" name="rd" required></textarea>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="files" value="{{ __('Upload Gcash QR') }}" />
                        <x-jet-input id="files" class="block mt-1 w-full" type="file" name="files" required style="background-color: white;"/>
                    </div>

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

                    <x-jet-input id="type" class="block mt-1 w-full" type="text" name="type" value="hotel" required hidden/>


                    <div class="flex items-center justify-end mt-4">
                             <x-jet-button class="ml-4">
                 {{ __('Add Payment Option') }}
                        </x-jet-button>
                    </div>
                </form>


                </div>


                <div class="mx-5 mt-5" style="float: right; position: relative; margin-left: 5em;">
                    <img src="Uploads/{{$qr[$cont-1]}}" alt="QR">

                    <div class="flex flex-row justify-between items-start mt-4">
                        <div>
                            <p class="font-normal text-s text-gray-800 leading-tight mt-2">Alternate Details</p><br>
                            <p class="font-normal text-s text-gray-800 leading-tight mt-2">{{$alt[$cont-1]}}
                            </p>
                        </div>

                    </div>

                </div>
            </div>


@endif

@endsection
