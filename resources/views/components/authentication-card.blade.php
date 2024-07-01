<div class="container">

    <!-- Logo -->
    {{ $logo }}

    <div class="form">
        <form action="#" method="POST">
            <div class="form-header">
                <div class="title">
                    <h1>@yield('title')</h1>
                </div>
                <div class="login-button">
                    <button type="button">@yield('butom')</button>
                    {{-- <a href="{{ route('register') }}">Cadastre-se</a> --}}
                </div>
            </div>
            <div class="input-group">
                {{ $slot }}
            </div>

        </form>
    </div>
</div>


{{-- <div class="container">

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

            {{ $logo }}


        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>

    </div> --}}




{{--
<div class="container">

    {{ $logo }}


    <div class="form">
        <form action="#">
            <div class="form-header">
                <div class="title">
                    <h1>Login</h1>
                </div>
                <div class="login-button">
                    <button><a href="#">Cadastre-se</a></button>
                </div>
            </div>
            <div class="input-group">
                {{ $slot }}
            </div>
        </form>
    </div>
</div> --}}
