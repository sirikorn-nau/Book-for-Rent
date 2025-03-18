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
            --top: -180px;
            /* ตำแหน่งของหนังสือ */
            --height_book: 300px;
            --width_book: 210px;
            --width_flip: 32px;
            --green:#2DB66E;
            --background:#171E31;

        }


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            /* font-family: "Inter", sans-serif; */
        }

        .imgLoader {
            position: fixed;
            -webkit-animation: preLoad 1s steps(1);
            animation: preLoad 1s steps(1);
            width: 1px;
            height: 1px;
        }

        .pages,
        .flips {
            transform-style: preserve-3d;
        }

        @-webkit-keyframes preLoad {
            0% {
                background-image: url("https://picsum.photos/420/300?random=1");
            }

            10% {
                background-image: url("https://picsum.photos/420/300?random=2");
            }

            20% {
                background-image: url("https://picsum.photos/420/300?random=3");
            }

            30% {
                background-image: url("https://picsum.photos/420/300?random=4");
            }

            40% {
                background-image: url("https://picsum.photos/420/300?random=5");
            }

            100% {
                display: none;
            }
        }

        @keyframes preLoad {
            0% {
                background-image: url("https://picsum.photos/420/300?random=1");
            }

            10% {
                background-image: url("https://picsum.photos/420/300?random=2");
            }

            20% {
                background-image: url("https://picsum.photos/420/300?random=3");
            }

            30% {
                background-image: url("https://picsum.photos/420/300?random=4");
            }

            40% {
                background-image: url("https://picsum.photos/420/300?random=5");
            }

            100% {
                display: none;
            }
        }

        /* perspective จะตั้งไว้ที่ container หลัก = ระยะที่กล้องห่างจากหน้าจอหรือ screenของเรา */
        .book {
            position: relative;
            perspective: 630px;
            perspective-origin: center 50px;
            /* transform: scale(var(--scale_book)); */
            filter: drop-shadow(0px 10px 5px rgba(0, 0, 0, 0.25));
        }

        .page {
            width: var(--width_book);
            height: var(--height_book);
            background-color: #bbb;
            position: absolute;
            top: var(--top);
            right: 50%;
            transform-origin: 100% 100%;
            /* มันคือจุดหมุน 100 100 คือ จุดหมุนอยู่ขวาล่างสุด หรือก็คือตรงสันหนังสือขีดตรงกลางที่ด้านล่าง https://developer.mozilla.org/en-US/docs/Web/CSS/transform-origin */
            border: solid #555 2px;
            background-size: 420px 300px;
            background-position: center;
            transform-style: preserve-3d;
            /* background-color: lawngreen; */
        }

        /* rotateX ที่เป็นบวกคือหมุนไปด้านหลัง
        แกน x กับ y ของ rotate ให้นึกถึงกราฟ เช่น ให้สมมติเราจับแกน yเหมือนจับเสาที่ตั้งฉากกับพื้นเหมือนในกราฟ แล้วถ้า rotateY คือเหมือนรูด หมุนไปกับเสาอะ   */
        .page:nth-child(1) {
            transform: rotateX(60deg) rotateY(3deg);
        }

        /* rotateY + คือหมุนไปทางขวา */
        .page:nth-child(2) {
            transform: rotateX(60deg) rotateY(4.5deg);
        }

        .page:nth-child(3) {
            transform: rotateX(60deg) rotateY(6deg);
            -webkit-animation: nextPage 25s infinite -24s steps(1);
            animation: nextPage 25s infinite -24s steps(1);
            /* animation-name, animation-duration, animation-iteration-count, animation-delay, animation-timing-function: steps(1) */
            background-size: 420px 300px;
            background-position: -2px -2px;
            /* background-color: red; */
        }


        @-webkit-keyframes nextPage {
            0% {
                background-image: url("https://picsum.photos/420/300?random=1");
            }

            20% {
                background-image: url("https://picsum.photos/420/300?random=2");
            }

            40% {
                background-image: url("https://picsum.photos/420/300?random=3");
            }

            60% {
                background-image: url("https://picsum.photos/420/300?random=4");
            }

            80% {
                background-image: url("https://picsum.photos/420/300?random=5");
            }
        }

        @keyframes nextPage {
            0% {
                background-image: url("https://picsum.photos/420/300?random=1");
            }

            20% {
                background-image: url("https://picsum.photos/420/300?random=2");
            }

            40% {
                background-image: url("https://picsum.photos/420/300?random=3");
            }

            60% {
                background-image: url("https://picsum.photos/420/300?random=4");
            }

            80% {
                background-image: url("https://picsum.photos/420/300?random=5");
            }
        }


        /* เป็นกระดาษฝั่งขวาของ Book */
        .page:nth-child(4) {
            transform: rotateX(60deg) rotateY(177deg);
        }

        .page:nth-child(5) {
            transform: rotateX(60deg) rotateY(175.5deg);
        }

        .page:nth-child(6) {
            transform: rotateX(60deg) rotateY(174deg);
            overflow: hidden;
            /* overflow คือเหมือนกับ text-wrap ถ้าเนื้อหาเกินกล่องที่มันอยู่ จะให้ซ่อนเนื้อหาไว้ มันไม่ได้เพิ่มเนื้อที่ให้ตัวอักษรเหมือน wrap ที่จะขยายกล่องให้ แต่อันนี้คือเราจะทำไรกับเนื้อหาที่เกินมาเลยไม่ได้ ถ้าเป้น overflow:scroll คือจะใส่ scroll ให้เลื่อนดูเนื้อหาได้ --> https://www.youtube.com/watch?v=d7cH8geV2dY  */
        }


        /* https://www.youtube.com/watch?v=_LxYNxeWpBo */
        .page:nth-child(6)::after {
            content: "";
            width: 210px;
            height: 300px;
            position: absolute;
            top: 0px;
            right: 0%;
            transform-origin: center;
            transform: rotateY(180deg);
            -webkit-animation: nextPage 25s -20s infinite steps(1);
            animation: nextPage 25s -20s infinite steps(1);
            background-size: 420px 300px;
            background-position: 100% -2px;
            /* background-color: red; */
        }



        .gap {
            width: 10px;
            height: 300px;
            background: none;
            transform: rotateX(60deg);
            transform-origin: bottom;
            position: absolute;
            top: var(--top);
            left: calc(50% - 5px);
        }

        .gap::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translate(-50%, 50%);
            background-color: #555;
            width: 10px;
            height: 5px;
            border-radius: 50%;
        }



        /* ถ้าอยากเข้าใจ flip ลบ 2 comment ออก เข้าใจเลย */
        .flip {
            width: var(--width_flip);
            height: var(--height_book);
            position: absolute;
            top: var(--top);
            transform-origin: 100% 100%;
            right: 100%;
            border: solid #555;
            border-width: 2px 0px;
            perspective: 4200px;
            perspective-origin: center;
            transform-style: preserve-3d;
            background-size: 420px 300px;
            /* comment 1 */
            /* background-color: #103cbe */
        }

        .flip::after {
            /* comment 2 ใส่ข้อความไรก็ได้ลงใน content */
            content: "";
            position: absolute;
            top: 0px;
            right: 0%;
            width: 100%;
            height: 100%;
            transform-origin: center;
            background-size: 420px 300px;
        }

        .flip.flip1 {
            right: 50%;
            -webkit-animation: flip1 5s infinite ease-in-out;
            animation: flip1 5s infinite ease-in-out;
            border-width: 2px 2px 2px 0;
        }

        .flip.flip1::after {
            -webkit-animation: nextFlip1 25s -20s infinite steps(1);
            animation: nextFlip1 25s -20s infinite steps(1);
        }

        .flip:not(.flip1) {
            right: calc(100% - 2px);
            top: -2px;
            transform-origin: right;
            -webkit-animation: flip2 5s ease-in-out infinite;
            animation: flip2 5s ease-in-out infinite;
        }

        .flip.flip2::after {
            -webkit-animation: nextFlip2 25s -20s infinite steps(1);
            animation: nextFlip2 25s -20s infinite steps(1);
        }

        .flip.flip3::after {
            -webkit-animation: nextFlip3 25s -20s infinite steps(1);
            animation: nextFlip3 25s -20s infinite steps(1);
        }

        .flip.flip4::after {
            -webkit-animation: nextFlip4 25s -20s infinite steps(1);
            animation: nextFlip4 25s -20s infinite steps(1);
        }

        .flip.flip5::after {
            -webkit-animation: nextFlip5 25s -20s infinite steps(1);
            animation: nextFlip5 25s -20s infinite steps(1);
        }

        .flip.flip6::after {
            -webkit-animation: nextFlip6 25s -20s infinite steps(1);
            animation: nextFlip6 25s -20s infinite steps(1);
        }

        .flip.flip7::after {
            -webkit-animation: nextFlip7 25s -20s infinite steps(1);
            animation: nextFlip7 25s -20s infinite steps(1);
        }

        .flip.flip7 {
            width: 30px;
            border-width: 2px 0px 2px 2px;
        }

        .flip.flip7::after {
            -webkit-animation: nextFlip7 25s -20s infinite steps(1);
            animation: nextFlip7 25s -20s infinite steps(1);
        }

        @-webkit-keyframes flip1 {

            0%,
            20% {
                transform: rotateX(60deg) rotateY(6deg);
            }

            80%,
            100% {
                transform: rotateX(60deg) rotateY(174deg);
            }
        }

        @keyframes flip1 {

            0%,
            20% {
                transform: rotateX(60deg) rotateY(6deg);
            }

            80%,
            100% {
                transform: rotateX(60deg) rotateY(174deg);
            }
        }

        @-webkit-keyframes flip2 {

            0%,
            20% {
                transform: rotateY(0deg) translateY(0px);
            }

            50% {
                transform: rotateY(-15deg) translateY(0px);
            }
        }

        @keyframes flip2 {

            0%,
            20% {
                transform: rotateY(0deg) translateY(0px);
            }

            50% {
                transform: rotateY(-15deg) translateY(0px);
            }
        }

        @-webkit-keyframes nextFlip1 {
            0% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -178px -2px;
                transform: rotateY(0deg);
            }

            10% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -210px -2px;
                transform: rotateY(180deg);
            }

            20% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -178px -2px;
                transform: rotateY(0deg);
            }

            30% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -210px -2px;
                transform: rotateY(180deg);
            }

            40% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -178px -2px;
                transform: rotateY(0deg);
            }

            50% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -210px -2px;
                transform: rotateY(180deg);
            }

            60% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -178px -2px;
                transform: rotateY(0deg);
            }

            70% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -210px -2px;
                transform: rotateY(180deg);
            }

            80% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -178px -2px;
                transform: rotateY(0deg);
            }

            90% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -210px -2px;
                transform: rotateY(180deg);
            }
        }

        @keyframes nextFlip1 {
            0% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -178px -2px;
                transform: rotateY(0deg);
            }

            10% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -210px -2px;
                transform: rotateY(180deg);
            }

            20% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -178px -2px;
                transform: rotateY(0deg);
            }

            30% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -210px -2px;
                transform: rotateY(180deg);
            }

            40% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -178px -2px;
                transform: rotateY(0deg);
            }

            50% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -210px -2px;
                transform: rotateY(180deg);
            }

            60% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -178px -2px;
                transform: rotateY(0deg);
            }

            70% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -210px -2px;
                transform: rotateY(180deg);
            }

            80% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -178px -2px;
                transform: rotateY(0deg);
            }

            90% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -210px -2px;
                transform: rotateY(180deg);
            }
        }

        @-webkit-keyframes nextFlip2 {
            0% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -148px -2px;
                transform: rotateY(0deg);
            }

            10.5% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -238px -2px;
                transform: rotateY(180deg);
            }

            20% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -148px -2px;
                transform: rotateY(0deg);
            }

            30.5% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -238px -2px;
                transform: rotateY(180deg);
            }

            40% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -148px -2px;
                transform: rotateY(0deg);
            }

            50.5% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -238px -2px;
                transform: rotateY(180deg);
            }

            60% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -148px -2px;
                transform: rotateY(0deg);
            }

            70.5% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -238px -2px;
                transform: rotateY(180deg);
            }

            80% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -148px -2px;
                transform: rotateY(0deg);
            }

            90.5% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -238px -2px;
                transform: rotateY(180deg);
            }
        }

        @keyframes nextFlip2 {
            0% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -148px -2px;
                transform: rotateY(0deg);
            }

            10.5% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -238px -2px;
                transform: rotateY(180deg);
            }

            20% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -148px -2px;
                transform: rotateY(0deg);
            }

            30.5% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -238px -2px;
                transform: rotateY(180deg);
            }

            40% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -148px -2px;
                transform: rotateY(0deg);
            }

            50.5% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -238px -2px;
                transform: rotateY(180deg);
            }

            60% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -148px -2px;
                transform: rotateY(0deg);
            }

            70.5% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -238px -2px;
                transform: rotateY(180deg);
            }

            80% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -148px -2px;
                transform: rotateY(0deg);
            }

            90.5% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -238px -2px;
                transform: rotateY(180deg);
            }
        }

        @-webkit-keyframes nextFlip3 {
            0% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -118px -2px;
                transform: rotateY(0deg);
            }

            11% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -268px -2px;
                transform: rotateY(180deg);
            }

            20% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -118px -2px;
                transform: rotateY(0deg);
            }

            31% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -268px -2px;
                transform: rotateY(180deg);
            }

            40% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -118px -2px;
                transform: rotateY(0deg);
            }

            51% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -268px -2px;
                transform: rotateY(180deg);
            }

            60% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -118px -2px;
                transform: rotateY(0deg);
            }

            71% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -268px -2px;
                transform: rotateY(180deg);
            }

            80% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -118px -2px;
                transform: rotateY(0deg);
            }

            91% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -268px -2px;
                transform: rotateY(180deg);
            }
        }

        @keyframes nextFlip3 {
            0% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -118px -2px;
                transform: rotateY(0deg);
            }

            11% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -268px -2px;
                transform: rotateY(180deg);
            }

            20% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -118px -2px;
                transform: rotateY(0deg);
            }

            31% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -268px -2px;
                transform: rotateY(180deg);
            }

            40% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -118px -2px;
                transform: rotateY(0deg);
            }

            51% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -268px -2px;
                transform: rotateY(180deg);
            }

            60% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -118px -2px;
                transform: rotateY(0deg);
            }

            71% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -268px -2px;
                transform: rotateY(180deg);
            }

            80% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -118px -2px;
                transform: rotateY(0deg);
            }

            91% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -268px -2px;
                transform: rotateY(180deg);
            }
        }

        @-webkit-keyframes nextFlip4 {
            0% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -88px -2px;
                transform: rotateY(0deg);
            }

            11.5% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -298px -2px;
                transform: rotateY(180deg);
            }

            20% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -88px -2px;
                transform: rotateY(0deg);
            }

            31.5% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -298px -2px;
                transform: rotateY(180deg);
            }

            40% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -88px -2px;
                transform: rotateY(0deg);
            }

            51.5% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -298px -2px;
                transform: rotateY(180deg);
            }

            60% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -88px -2px;
                transform: rotateY(0deg);
            }

            71.5% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -298px -2px;
                transform: rotateY(180deg);
            }

            80% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -88px -2px;
                transform: rotateY(0deg);
            }

            91.5% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -298px -2px;
                transform: rotateY(180deg);
            }
        }

        @keyframes nextFlip4 {
            0% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -88px -2px;
                transform: rotateY(0deg);
            }

            11.5% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -298px -2px;
                transform: rotateY(180deg);
            }

            20% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -88px -2px;
                transform: rotateY(0deg);
            }

            31.5% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -298px -2px;
                transform: rotateY(180deg);
            }

            40% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -88px -2px;
                transform: rotateY(0deg);
            }

            51.5% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -298px -2px;
                transform: rotateY(180deg);
            }

            60% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -88px -2px;
                transform: rotateY(0deg);
            }

            71.5% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -298px -2px;
                transform: rotateY(180deg);
            }

            80% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -88px -2px;
                transform: rotateY(0deg);
            }

            91.5% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -298px -2px;
                transform: rotateY(180deg);
            }
        }

        @-webkit-keyframes nextFlip5 {
            0% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -58px -2px;
                transform: rotateY(0deg);
            }

            12% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -328px -2px;
                transform: rotateY(180deg);
            }

            20% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -58px -2px;
                transform: rotateY(0deg);
            }

            32% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -328px -2px;
                transform: rotateY(180deg);
            }

            40% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -58px -2px;
                transform: rotateY(0deg);
            }

            52% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -328px -2px;
                transform: rotateY(180deg);
            }

            60% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -58px -2px;
                transform: rotateY(0deg);
            }

            72% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -328px -2px;
                transform: rotateY(180deg);
            }

            80% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -58px -2px;
                transform: rotateY(0deg);
            }

            92% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -328px -2px;
                transform: rotateY(180deg);
            }
        }

        @keyframes nextFlip5 {
            0% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -58px -2px;
                transform: rotateY(0deg);
            }

            12% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -328px -2px;
                transform: rotateY(180deg);
            }

            20% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -58px -2px;
                transform: rotateY(0deg);
            }

            32% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -328px -2px;
                transform: rotateY(180deg);
            }

            40% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -58px -2px;
                transform: rotateY(0deg);
            }

            52% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -328px -2px;
                transform: rotateY(180deg);
            }

            60% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -58px -2px;
                transform: rotateY(0deg);
            }

            72% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -328px -2px;
                transform: rotateY(180deg);
            }

            80% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -58px -2px;
                transform: rotateY(0deg);
            }

            92% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -328px -2px;
                transform: rotateY(180deg);
            }
        }

        @-webkit-keyframes nextFlip6 {
            0% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -28px -2px;
                transform: rotateY(0deg);
            }

            12.5% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -358px -2px;
                transform: rotateY(180deg);
            }

            20% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -28px -2px;
                transform: rotateY(0deg);
            }

            32.5% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -358px -2px;
                transform: rotateY(180deg);
            }

            40% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -28px -2px;
                transform: rotateY(0deg);
            }

            52.5% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -358px -2px;
                transform: rotateY(180deg);
            }

            60% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -28px -2px;
                transform: rotateY(0deg);
            }

            72.5% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -358px -2px;
                transform: rotateY(180deg);
            }

            80% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -28px -2px;
                transform: rotateY(0deg);
            }

            92.5% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -358px -2px;
                transform: rotateY(180deg);
            }
        }

        @keyframes nextFlip6 {
            0% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -28px -2px;
                transform: rotateY(0deg);
            }

            12.5% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -358px -2px;
                transform: rotateY(180deg);
            }

            20% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -28px -2px;
                transform: rotateY(0deg);
            }

            32.5% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -358px -2px;
                transform: rotateY(180deg);
            }

            40% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -28px -2px;
                transform: rotateY(0deg);
            }

            52.5% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -358px -2px;
                transform: rotateY(180deg);
            }

            60% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -28px -2px;
                transform: rotateY(0deg);
            }

            72.5% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -358px -2px;
                transform: rotateY(180deg);
            }

            80% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -28px -2px;
                transform: rotateY(0deg);
            }

            92.5% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -358px -2px;
                transform: rotateY(180deg);
            }
        }

        @-webkit-keyframes nextFlip7 {
            0% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -2px -2px;
                transform: rotateY(0deg);
            }

            13% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -388px -2px;
                transform: rotateY(180deg);
            }

            20% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -2px -2px;
                transform: rotateY(0deg);
            }

            33% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -388px -2px;
                transform: rotateY(180deg);
            }

            40% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -2px -2px;
                transform: rotateY(0deg);
            }

            53% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -388px -2px;
                transform: rotateY(180deg);
            }

            60% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -2px -2px;
                transform: rotateY(0deg);
            }

            73% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -388px -2px;
                transform: rotateY(180deg);
            }

            80% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -2px -2px;
                transform: rotateY(0deg);
            }

            93% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -388px -2px;
                transform: rotateY(180deg);
            }
        }

        @keyframes nextFlip7 {
            0% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -2px -2px;
                transform: rotateY(0deg);
            }

            13% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -388px -2px;
                transform: rotateY(180deg);
            }

            20% {
                background-image: url("https://picsum.photos/420/300?random=2");
                background-position: -2px -2px;
                transform: rotateY(0deg);
            }

            33% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -388px -2px;
                transform: rotateY(180deg);
            }

            40% {
                background-image: url("https://picsum.photos/420/300?random=3");
                background-position: -2px -2px;
                transform: rotateY(0deg);
            }

            53% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -388px -2px;
                transform: rotateY(180deg);
            }

            60% {
                background-image: url("https://picsum.photos/420/300?random=4");
                background-position: -2px -2px;
                transform: rotateY(0deg);
            }

            73% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -388px -2px;
                transform: rotateY(180deg);
            }

            80% {
                background-image: url("https://picsum.photos/420/300?random=5");
                background-position: -2px -2px;
                transform: rotateY(0deg);
            }

            93% {
                background-image: url("https://picsum.photos/420/300?random=1");
                background-position: -388px -2px;
                transform: rotateY(180deg);
            }
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
            /* background: #ececec; */
        }

        #box {
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(20px);
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            border-radius: 10px;
            /* padding: 30px 40px; */
        }



        #text-inter {
            color: black;
            font-family: "Inter", sans-serif;
        }

        #input{
            font-family: 'Open Sans', sans-serif; letter-spacing: 2px;
            font-size: 20px;
            /* font-weight:bold; */
            display: block;
            color:white;
            /* border: 2px solid; */
            /* border-color: black; */
            /* background: none; */
            background-color: var(--background) ;
        }

        #input:hover{
            /* background-color: var(--green);
            color: whitesmoke;
            transition: background-color 2s ease-out; */
            font-weight: bold;
            /* color: var(--green) */
        }




        /*------------ Login container ------------*/
        .box-area {
            width: 1100px;
        }

        /*------------ Right box ------------*/
        .right-box {
            padding: 40px 30px 40px 40px;
        }

        /*------------ Custom Placeholder ------------*/
        ::placeholder {
            font-size: 16px;
        }

        .rounded-4 {
            border-radius: 20px;
        }

        .rounded-5 {
            border-radius: 30px;
        }


        #email {
            border-radius: 18px;
            padding: 10px 15px;
        }

        #password {
            border-radius: 18px;
            padding: 10px 15px;
            margin-bottom: 5px;
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

        /*------------ For small screens------------*/
        /* ความกว้าง ไม่เกิน 768 พิกเซล คือความกว้างน้อยกว่า 768 px  */
        @media only screen and (max-width: 768px) {
            .box-area {
                margin: 0 10px;
            }

            :root {
                --top: -10px;
                --height_book: 60px;
                --width_book: 100px;
                --width_flip: 13.5px;

            }

            .left-box {
                height: 100px;
                overflow: hidden;
            }

            .right-box {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="imgLoader"></div>

    <!----------------------- Main Container -------------------------->
    <div class="container d-flex justify-content-center align-items-center min-vh-100" >
        {{-- d-flex ถ้าตั้งไว้ที่ container ที่เป็นตัวแม่ ตัวลูกหรือพวก div ข้างใน container ก็จะได้รับ d-flex ไปด้วย ประหนึ่งตั้งไว้ที่แม่ เพื่อทำให้กล่องมัน flex ปล. defualt ของ flex direction คือ row --}}
        <!----------------------- Login Container -------------------------->
        <div class="row border rounded-5 p-3 bg-white shadow box-area" id="box">


            <!--------------------------- Left Box ----------------------------->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="">


                {{-- <div class="featured-image mb-3">
                    <img src="images/1.png" class="img-fluid" style="width: 250px;">
                </div> --}}
                <div class="featured-image mb-3">

                    <div class="book">
                        <div class="gap"></div>
                        <div class="pages">
                            <div class="page"></div>
                            <div class="page"></div>
                            <div class="page"></div>
                            <div class="page"></div>
                            <div class="page"></div>
                            <div class="page"></div>
                        </div>

                        {{-- flip คืออิหน้าที่กำลังพลิกอยู่ ถูกสร้างมาเปน animation การพลิก ถ้าไม่มี flip จะเปนแค่หน้าหนังสือสองหน้าเฉยๆ😵‍💫 --}}
                        <div class="flips">
                            <div class="flip flip1">
                                <div class="flip flip2">
                                    <div class="flip flip3">
                                        <div class="flip flip4">
                                            <div class="flip flip5">
                                                <div class="flip flip6">
                                                    <div class="flip flip7"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>







                {{-- <p class="text-black fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Be
                    Verified
                </p> --}}
                {{-- text-wrap มันเหมือนการห่อ ถ้าเกินว่า ตัวอักษรมันเกินขนาดกล่องที่มันอยู่ ถ้าไม่ตั้ง text-wrap ไว้ มันจะเกินขนาดออกไป แต่ถ้า wrap มันจะปัดตกมาเปนบรรทัดที่สอง เพื่อให้ตัวอักษรมันไม่หลุดออกนอกกล่องที่ text มันอยู่ --}}
                {{-- <small class="text-white text-wrap text-center"
                    style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Join experienced Designers on
                    this platform.
                </small> --}}
            </div>




            <!-------------------- ------ Right Box ---------------------------->

            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2 style="font-size:3rem;font-family: 'Open Sans', sans-serif; text-transform: uppercase; font-weight:bold">Welcome</h2>
                        <p >Have fun choosing your book.</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group mb-3">
                            {{-- <input type="text" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Email address"> --}}
                                <input id="email" type="email"
                                        class="form-control form-control-lg bg-light fs-6
                                        @error('email') is-invalid
                                        @enderror"
                                        name="email"
                                        placeholder="Email address"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error(' email') <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror


                        </div>
                        <div class="input-group mb-1">
                            {{-- <input type="password" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Password"> --}}

                            <input id="password" type="password" class="form-control form-control-lg bg-light fs-6
                            @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror



                        </div>
                        <div class="input-group mb-5 d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember" class="form-check-label text-secondary">
                                    <small>{{ __('Remember Me') }}</small>
                                </label>
                            </div>
                            <div class="forgot">
                                @if (Route::has('password.request'))
                                    <small><a
                                            href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a></small>
                                @endif
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input class="btn btn-lg btn-primary w-100 fs-6" type="submit" id="input" value="Login">

                        </div>
                        <div class="input-group mb-3">
                            {{-- <button class="btn btn-lg btn-light w-100 fs-6"><img src="images/google.png" style="width:20px"
                            class="me-2"><small>Sign In with Google</small></button> --}}
                        </div>
                        <div class="row">
                            <small>Don't have account?  <a href="{{ route('register') }}">Sign Up</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
