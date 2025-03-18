<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>@yield('title')</title>



    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- CKEditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.0/classic/ckeditor.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;

        }

        body {
            background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQk0ay4mR7OywI9urP8mD1nUBMIgTI90iryOf5SpvlvA4sgnhMMFVesqouc6l97r1C58uo&usqp=CAU');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;

        }

        #box {
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(20px);
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            border-radius: 10px;
            /* padding: 30px 40px; */
        }

        #title {
            display: flex;
            justify-content: center;
            font-size: 2rem;
            font-family: "Inter", sans-serif;
            font-weight: bold;
            font-optical-sizing: auto;
        }

        #text-inter {
            color: black;
            font-family: "Inter", sans-serif;
        }
    </style>


</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" '>
                <div class="card" id='box'>
                    <div class="card-header" id='title'>{{ __('Login') }}</div>
                    <div class="card-body" id='text-inter'>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error(' email') <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>



        {{-- <div class="row mb-3">
            <div class="col-md-6 offset-md-4 ">
                <div class="form-check ">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

            </div>

            <div class="col-md-6 offset-md-4">
                @if (Route::has('password.request'))
                <a id='text-inter' class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>

        </div> --}}

        {{-- Underline offset = Change the underline’s distance from your text. Offset is set in em units to automatically scale with the element’s current font-size. --}}







        {{-- mb-3 = margin bottom --}}
        <div class="row mb-3 justify-content-center align-items-center">


            {{-- ! 1 --}}
            <div class="col col-md-6 text-md-end   ">
                <div class=" col-md-10 text-md-end col-sm-8">
                    <div class="form-check d-flex justify-content-end ">
                        <input class="form-check-input " type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label px-3" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

            </div>


            {{-- ! 2 --}}
            <div class="col col-md-6 ">

                <div class="col-md-8 text-md-end">
                    @if (Route::has('password.request'))
                    <a id='text-inter' class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="row mb-0 bg-warning">
            <div class="col-md-8 offset-md-2 bg-danger">
                <button style="font-family: "Inter", sans-serif;" type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>


            </div>
        </div>


        {{-- <div class="row">
            <div class="col">col1</div>
            <div class="col">col2</div>
            <div class="col">col3</div>
            <div class="col">col4</div>
            <div class="col">col5</div>
            <div class="col">col6</div>
            <div class="col">col7</div>
            <div class="col">col8</div>
            <div class="col">col9</div>
            <div class="col">col10</div>
            <div class="col">col11</div>
            <div class="col">col12</div>
        </div> --}}




        </form>
    </div>
    </div>
    </div>
    </div>
    </div>




</body>

</html>
