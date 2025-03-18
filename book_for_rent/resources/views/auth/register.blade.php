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
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

        /* Font for Books Left */
        @import url('https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap');

        @import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400|Lora');

        :root {
            --green:#2DB66E;
            --background:#171E31;
        }


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            /* font-family: "Inter", sans-serif; */
        }

        body {
            /* background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQk0ay4mR7OywI9urP8mD1nUBMIgTI90iryOf5SpvlvA4sgnhMMFVesqouc6l97r1C58uo&usqp=CAU'); */
            background-color: var(--background);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;

        }

        #box {
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(20px);
            box-shadow: 0 0 10px rgb(93, 93, 93);
            border-radius: 10px;
        }



        .form-control{
            border-radius: 15px;
            padding: 10px 15px;
        }


        label{
            font-weight:bold;
        }

        #asterisk{
            color: red;

        }



        #input {
            font-family: 'Open Sans', sans-serif; letter-spacing: 2px;
            font-size: 16px;
            font-weight:bold;
            display: block;
            color: white;
            border: 0;
        }

        #inputRegister{
            font-family: 'Open Sans', sans-serif; letter-spacing: 2px;
            font-size: 16px;
            display: block;
            color: white;
            border: 0;
        }

        #inputRegister:hover{
            font-weight: bold;
        }

        /*------------ Custom Placeholder ------------*/
        ::placeholder {
            font-size: 16px;
        }

        /*------------ Select Input ------------*/
        input[type=text]:focus{
            box-shadow: #7be2abf8 0px 0px 6px 1px;
        }

        input[type=email]:focus{
            /* outline: none; */
            /* border: none; */
            /* box-shadow: 1 1 1 3px orange; */
            box-shadow: #7be2abf8 0px 0px 6px 1px;
            /* box-shadow: #7be2abf8 0px 0px 8px; */
        }

        input[type=password]:focus{
            box-shadow: #7be2abf8 0px 0px 6px 1px;
        }


    </style>
</head>

<body>

    <!----------------------- Main Container -------------------------->
    <div class="container d-flex justify-content-center align-items-center min-vh-120 " >
        {{-- d-flex ถ้าตั้งไว้ที่ container ที่เป็นตัวแม่ ตัวลูกหรือพวก div ข้างใน container ก็จะได้รับ d-flex ไปด้วย ประหนึ่งตั้งไว้ที่แม่ เพื่อทำให้กล่องมัน flex ปล. defualt ของ flex direction คือ row --}}
        <!----------------------- Login Container -------------------------->
        <div class="row border rounded-5 p-5 bg-white " id="box">


            <!-------------------- ------ Center Box ---------------------------->
            <div class="col-md-12 right-box d-flex justify-content-center align-items-center flex-column">
                <div class="row align-items-center">
                    <div class="header-text mb-4 d-flex justify-content-center align-items-center">
                        <h2 style="font-size:50px;font-family: 'Open Sans', sans-serif; text-transform: uppercase; font-weight:bold">Sign Up</h2>
                    </div>


                    <form method="POST" action="{{ route('register') }}" style="font-family: 'Inter', sans-serif;">
                        @csrf

                        <div class="row mb-4">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Username') }} <span id="asterisk">*</span></label>

                            <div class="col-md-7">
                                <input placeholder="Username" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }} <span id="asterisk">*</span></label>

                            <div class="col-md-7">

                                <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }} <span id="asterisk">*</span></label>

                            <div class="col-md-7">
                                <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }} <span id="asterisk">*</span></label>

                            <div class="col-md-7">
                                <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6 offset-md-4 ">
                                <small>Have Account  <a href="{{ route('login') }}">Log in</a></small>
                            </div>
                        </div>

                        <div class="row mb-0">
                            {{--* offset คือการย้ายไปสี่ช่อง ส่วน 6 ไม่ใช่บอกให้เริ่มตำแหน่งที่ 6 แต่คือให้ใช้พื้นที่ไปอีก 6 ช่องต่างหาก --}}
                            <div class="col-md-7 offset-md-4 ">
                                {{-- <button type="submit" class="btn col-md-12 text-light bg-dark" id="input">
                                    {{ __('Register') }}
                                </button> --}}
                                <input class="btn col-md-12 text-light bg-dark" type="submit" id="inputRegister" value="Register">
                            </div>
                        </div>
                    </form>




                </div>
            </div>

        </div>
    </div>


</body>



</html>
