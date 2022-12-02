@extends('layouts.htelregist')

@section('regist')

    <x-jet-authentication-card>
        <x-slot name="logo">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register a Hotel') }}
        </h2>
    </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Hotel Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Address') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="loc" :value="old('loc')" required autofocus autocomplete="loc" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="pf" value="{{ __('Profile Photo') }}" />
                <x-jet-input id="pf" class="block mt-1 w-full" type="file" name="pf"  required/>
            </div>

            <x-jet-input id="type" class="block mt-1 w-full" type="text" name="type" value="hotel" required hidden/>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/lg    ">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
             
                    {{ __('Register') }}
             
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>


@endsection
