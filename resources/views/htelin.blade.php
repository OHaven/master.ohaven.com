@extends('layouts.hotelin')

@section('login')

    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="assets/img/logo.png" style="height: 5em;">
            <h1 class="logo me-auto me-lg-0"><a href="/">Hotel Login</h1></a>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST">
            @csrf
            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
        </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif


                <x-jet-button class="ml-4">
                    <a href="rghotel">
                    Register</a>
                </x-jet-button>

                <x-jet-button class="ml-4">
                    <a href="loginhotel">
                        Login</a>
                </x-jet-button>



        </form>

    </x-jet-authentication-card>


@endsection
