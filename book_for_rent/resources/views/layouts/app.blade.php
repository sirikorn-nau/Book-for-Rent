<!doctype html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- title --}}
    <title>@yield('title')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- CKEditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.0/classic/ckeditor.js"></script>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap"
        {{-- Css --}} <link rel="stylesheet" href="../styles.css">

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>
    <div class="main-container d-flex">

        <div class="sidebar" id="side_nav"
            style="font-family: 'Josefin Sans', sans-serif; font-weight: 500; font-size: 19;">
            <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
                <h1 class="fs-4">
                    <img src="https://media.discordapp.net/attachments/1211734649337024643/1211740157766799400/Brown_and_Beige_Modern_Bookstore_Logo-removebg-preview2.png?ex=65ef4bf6&is=65dcd6f6&hm=95555cb7e8b4018139a013a942c6a5c6090df629ee0ad1c2957a1754db37e47a&=&format=webp&quality=lossless&width=418&height=153"
                        class="logo-img" style="width: 190px; height: 70px;">

                </h1>
            </div>
            <ul class="list-unstyled px-2">
                <li class=""><a href="../index.php" class="text-decoration-none px-3 py-2 d-block"> Home
                    </a></li>
                <li class=""><a href="../profile.php" class="text-decoration-none px-3 py-2 d-block">
                        Profile</a></li>
                <li class=""><a href="../cart.php"
                        class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between">
                        Your cart</span>
                        <!-- <span class="bg-dark rounded-pill text-white py-0 px-2">02</span> -->
                    </a>
                </li>
            </ul>
            <!-- <hr class="h-color mx-2"> -->
            <ul class="list-unstyled px-2">
                <p class="px-3 py-2 d-block" style="color: #949292; font-size: 18px;">CATAGORIES</p>
                <li class=""><a href="allbooks.php" class="text-decoration-none px-3 py-2 d-block">
                        All Books</a></li>
                <li class=""><a href="lang.php" class="text-decoration-none px-3 py-2 d-block">
                        Language</a></li>
                <li class=""><a href="romance.php" class="text-decoration-none px-3 py-2 d-block">
                        Romance</a></li>
                <li class=""><a href="horror.php" class="text-decoration-none px-3 py-2 d-block">
                        Horror</a></li>
                <li class=""><a href="history.php" class="text-decoration-none px-3 py-2 d-block">
                        History</a></li>
                <li class=""><a href="mystery.php" class="text-decoration-none px-3 py-2 d-block">
                        Mystery</a></li>
                <li class=""><a href="bio.php" class="text-decoration-none px-3 py-2 d-block">
                        Biography</a></li>
                <li class=""><a href="travel.php" class="text-decoration-none px-3 py-2 d-block">
                        Travel</a></li>
                <li class=""><a href="productive.php" class="text-decoration-none px-3 py-2 d-block">
                        Productivity</a></li>
                <li class="active"><a href="academic.php" class="text-decoration-none px-3 py-2 d-block">
                        Academic</a></li>
                <li class=""><a href="fantasy.php" class="text-decoration-none px-3 py-2 d-block">
                        Fantasy</a></li>


            </ul>
        </div>

        <div class="content">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
