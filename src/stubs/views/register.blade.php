<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div class="">
        <div class="">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <label for="name" class="">{{ __('Name') }}</label>

                <div class="">
                    <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                <div class="">
                    <input id="username" type="text" class="@error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                    @error('username')
                        <span class="" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <label for="email" class="">{{ __('E-Mail Address') }}</label>

                <div class="">
                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <label for="password" class="">{{ __('Password') }}</label>

                <div class="">
                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

                <div class="">
                    <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="">
                    <button type="submit" class="">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
