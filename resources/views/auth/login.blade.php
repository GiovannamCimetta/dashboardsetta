<x-guest-layout>
    <head>
        <link rel="stylesheet" href="{{ asset('front-end/css/login_css.css') }}">

    </head>
    @section('title', 'LOGIN')
    @section('butom')
    <a href="{{ route('register') }}">Cadastre-se</a>
    @endsection
    <x-authentication-card>
        <x-slot name="logo" >
            <x-authentication-card-logo />

        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-box">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="input-box">
                <x-label for="password" value="{{ __('Senha') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">


            </div>

            <div class="gender-inputs">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('
Lembre de mim') }}</span>
                </label>
                <br>
                @if (Route::has('password.request'))

                        <a class=" text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                            {{ __('Não é cadastrado ainda? Registre-se') }}
                        </a>
                    </a>
                @endif

            </div>
            <div class="continue-button">

                <x-button class="ms-1">

                    {{ __('Login') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>

</x-guest-layout>
