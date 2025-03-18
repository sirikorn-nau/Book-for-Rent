@extends('layouts.layout3')

@section('title', 'Home')


<head>
    <style>
        :root {
            --green: #2DB66E;
            --background: #2e3f61;
            --red: #EA6DA1;
            --darkblue: #12192C;
            --header18: 18px;
            font-family: 'Open Sans', sans-serif;
            /* font-family: "Inter", sans-serif; */
        }

        /* padding-left: 1rem;
        padding-right: 1rem; */

        #head {
            padding-left: 1rem;
            padding-right: 1rem;
            margin-top: 2rem;
            margin-bottom: 50rem;
            /* ใส่ไว้ก่อน ค่อยลบ */
        }

        .favoriteBook>blockquote {
            margin-left: 2rem;

        }

        blockquote {
            display: block;
            background: none;
            padding: 10px 20px;
            /* margin: 0 0 20px; */
            position: relative;
            font-family: "Inter", sans-serif;
            font-size: 40px;
            line-height: 1.2;
            color: var(--green);
            text-align: justify;
            border-left: 10px solid var(--green);

        }


        /* <!--------------------------- shelf ----------------------------> */
        .bookshelf {
            width: 900px;
            margin: 3rem auto;
            text-align: center;
            position: relative;
            /* background: red; */
        }

        .book-grid {
            z-index: 2;
            position: relative;
            transform: translateY(-13px);
        }

        .book-grid ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
        }

        .book-grid ul li {
            justify-self: center;
        }

        .book-grid ul img {
            display: block;
            box-shadow: 0px -5px 20px 2px rgba(0, 0, 0, 0.3);
            /* width: 200px;
            height: 300px; */
            width: 270px;
            height: 400px;
            -o-object-fit: cover;
            object-fit: cover;
        }

        .shelf-shadows {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            /* height: 1rem; */
            height: 10px;
            border-radius: 2px;
            z-index: 1;
            box-shadow: 0px -5px 3px 0px rgba(170, 170, 170, 0.2), 0px 15px 20px 0px rgba(170, 170, 170, 0.7), 0px 5px 5px 0px rgba(119, 119, 119, 0.3);
        }

        .shelf {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 13px;
            background-color: #f9f9f9;
            border-radius: 2px;
            z-index: 3;
        }

        li>img:hover {
            opacity: 0.60;
            cursor: pointer;
        }


        /* <!--------------------------- Books ----------------------------> */
        #book {
            /* background-color: rgb(73, 68, 68); */
            display: block;
            padding: 0 15px;
            max-width: 300px;
            min-width: 300px;
        }


        #book:hover {
            /* border: 1px solid white; */
        }


        #book>img {
            width: 270px;
            height: 400px;
        }

        #book>h3 {
            color: var(--green);
            font-weight: bold;
        }

        #book>h4 {
            margin-top: 10px;
        }

        #shelfBooks {
            margin-bottom: 30px;
        }


        #saleCost {
            color: grey;
            font-size: 20px;
            text-decoration: line-through;
            font-weight: normal;
        }


        .col {
            margin-bottom: 30px;
        }

        #seeAll{
            color: var(--red);
            font-size: 18px;
        }
        #seeAll:hover{
            font-weight: bold;
            color: #fd3e8e;
        }



        /* #trybook{
            max-width: 100px;
            min-width: 100px;
        }

        #trybook div {
            background: #2e3f61;
            padding: 0 15px;

        }

        #trybook div img{
            width: 270px;
            height: 400px;
        } */






        /* <!--------------------------- responsive ----------------------------> */
        @media screen and (max-width: 400px) {
            #head {
                padding-left: 0rem;
                padding-right: 0rem;
                margin-top: 2rem;
                margin-bottom: 50rem;
                /* ใส่ไว้ก่อน ค่อยลบ */
            }
        }
    </style>
</head>


@section('content')

    <div id="head">
        <div class="favoriteBook">
            <blockquote>
                หนังสือที่คนชอบมากที่สุด
            </blockquote>
        </div>


        {{-- <div class="shelf">
            <div class="bookend_left"></div>
            <div class="bookend_right"></div>
            <div class="reflection"></div>
        </div> --}}


        <div class="bookshelf">
            <div class="book-grid">
                <ul>
                    <li> <img
                            src="https://images-na.ssl-images-amazon.com/images/I/51uLvJlKpNL._SX321_BO1,204,203,200_.jpg" />
                    </li>
                    <li> <img src="https://i.pinimg.com/564x/63/e6/e3/63e6e36d8786e886dbc5b52ce1146fdb.jpg" /></li>
                    <li> <img src="https://i.pinimg.com/564x/cb/8a/62/cb8a62ea006966a0310029d548afa945.jpg" /></li>
                </ul>
            </div>
            <div class="shelf-shadows"></div>
            <div class="shelf"></div>
        </div>

        <div style="margin-top: 5rem">

            <div class="container">

                {{-- แถวที่ 1  --}}
                <div class="row" id="shelfBooks">
                    <div style="display: flex; justify-content:space-between; align-items:center;">
                        <h1>หนังสือขายดี</h1>
                        <a id="seeAll" href="#" >ดูทั้งหมด <span style="font-weight: bold; ">></span></a>
                    </div>
                    <hr>

                    <div class="col">
                        <div id="book">
                            <img src="https://i.pinimg.com/564x/e0/9b/34/e09b34cfd970f848c4bff707e1d60923.jpg"
                                alt="" srcset="">
                            <h4>บัณฑิตชาวนา ขอท่านใต้เท้าโปรดให้อภัย 1 ผู้เขียน: หลีซานเยี่ย หนังสือให้เช่า ประเภท
                                นิยายจีนแปล</h4>
                            <h3>52.00 บาท <span id="saleCost">174</span></h3>
                        </div>
                    </div>

                    <div class="col">
                        <div id="book">
                            <img src="https://i.pinimg.com/564x/cb/8a/62/cb8a62ea006966a0310029d548afa945.jpg"
                                alt="" srcset="">
                            <h4>บัณฑิตชาวนา ขอท่านใต้เท้าโปรดให้อภัย 1 ผู้เขียน: หลีซานเยี่ย หนังสือให้เช่า ประเภท
                                นิยายจีนแปล</h4>
                            <h3>100.00 บาท</h3>
                        </div>
                    </div>

                    <div class="col">
                        <div id="book">
                            <img src="https://cdn-local.mebmarket.com/meb/server1/106046/Thumbnail/book_detail_large.gif?4"
                                alt="" srcset="">
                            <h4>นิยายเรื่องนี้ข้าไม่ได้เขียน</h4>
                            <h3>100.00 บาท</h3>
                        </div>
                    </div>

                    <div class="col">
                        <div id="book">
                            <img src="https://i.pinimg.com/564x/3f/5a/1a/3f5a1ad943abb60fb045e06fa0207fe8.jpg"
                                alt="" srcset="">
                            <h4>บัณฑิตชาวนา ขอท่านใต้เท้าโปรดให้อภัย 1 ผู้เขียน: หลีซานเยี่ย หนังสือให้เช่า ประเภท
                                นิยายจีนแปล</h4>
                            <h3>100.00 บาท</h3>
                        </div>
                    </div>
                    {{$books->links()}}


                </div>

                {{-- แถวที่ 2 --}}
                <div class="row" id="shelfBooks">
                    <div style="display: flex; justify-content:space-between; align-items:center;">
                        <h1>หนังสือขายดีมาใหม่</h1>
                        <a id="seeAll" href="#" >ดูทั้งหมด <span style="font-weight: bold; ">></span></a>
                    </div>
                    <hr>
                    <div class="carousel slide" id="myCarousel">
                        <div class="carousel-inner">
                          <div class="item active">
                            <ul class="thumbnails">
                              <li class="span3">
                                <div class="thumbnail">
                                  <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                                </div>
                                <div class="caption">
                                  <h4>Praesent commodo</h4>
                                  <p>Nullam Condimentum Nibh Etiam Sem</p>
                                  <a class="btn btn-mini" href="#">&raquo; Read More</a>
                                </div>
                              </li>
                              <li class="span3">
                                <div class="thumbnail">
                                  <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                                </div>
                                <div class="caption">
                                  <h4>Praesent commodo</h4>
                                  <p>Nullam Condimentum Nibh Etiam Sem</p>
                                  <a class="btn btn-mini" href="#">&raquo; Read More</a>
                                </div>
                              </li>
                              <li class="span3">
                                <div class="thumbnail">
                                  <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                                </div>
                                <div class="caption">
                                  <h4>Praesent commodo</h4>
                                  <p>Nullam Condimentum Nibh Etiam Sem</p>
                                  <a class="btn btn-mini" href="#">&raquo; Read More</a>
                                </div>
                              </li>
                              <li class="span3">
                                <div class="thumbnail">
                                  <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                                </div>
                                <div class="caption">
                                  <h4>Praesent commodo</h4>
                                  <p>Nullam Condimentum Nibh Etiam Sem</p>
                                  <a class="btn btn-mini" href="#">&raquo; Read More</a>
                                </div>
                              </li>
                            </ul>
                          </div><!-- /Slide1 -->
                          <div class="item">
                            <ul class="thumbnails">
                              <li class="span3">
                                <div class="thumbnail">
                                  <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                                </div>
                                <div class="caption">
                                  <h4>Praesent commodo</h4>
                                  <p>Nullam Condimentum Nibh Etiam Sem</p>
                                  <a class="btn btn-mini" href="#">&raquo; Read More</a>
                                </div>
                              </li>
                              <li class="span3">
                                <div class="thumbnail">
                                  <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                                </div>
                                <div class="caption">
                                  <h4>Praesent commodo</h4>
                                  <p>Nullam Condimentum Nibh Etiam Sem</p>
                                  <a class="btn btn-mini" href="#">&raquo; Read More</a>
                                </div>
                              </li>
                              <li class="span3">
                                <div class="thumbnail">
                                  <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                                </div>
                                <div class="caption">
                                  <h4>Praesent commodo</h4>
                                  <p>Nullam Condimentum Nibh Etiam Sem</p>
                                  <a class="btn btn-mini" href="#">&raquo; Read More</a>
                                </div>
                              </li>
                              <li class="span3">
                                <div class="thumbnail">
                                  <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                                </div>
                                <div class="caption">
                                  <h4>Praesent commodo</h4>
                                  <p>Nullam Condimentum Nibh Etiam Sem</p>
                                  <a class="btn btn-mini" href="#">&raquo; Read More</a>
                                </div>
                              </li>
                            </ul>
                          </div><!-- /Slide2 -->
                          <div class="item">
                            <ul class="thumbnails">
                              <li class="span3">
                                <div class="thumbnail">
                                  <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                                </div>
                                <div class="caption">
                                  <h4>Praesent commodo</h4>
                                  <p>Nullam Condimentum Nibh Etiam Sem</p>
                                  <a class="btn btn-mini" href="#">&raquo; Read More</a>
                                </div>
                              </li>
                              <li class="span3">
                                <div class="thumbnail">
                                  <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                                </div>
                                <div class="caption">
                                  <h4>Praesent commodo</h4>
                                  <p>Nullam Condimentum Nibh Etiam Sem</p>
                                  <a class="btn btn-mini" href="#">&raquo; Read More</a>
                                </div>
                              </li>
                              <li class="span3">
                                <div class="thumbnail">
                                  <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                                </div>
                                <div class="caption">
                                  <h4>Praesent commodo</h4>
                                  <p>Nullam Condimentum Nibh Etiam Sem</p>
                                  <a class="btn btn-mini" href="#">&raquo; Read More</a>
                                </div>
                              </li>
                              <li class="span3">
                                <div class="thumbnail">
                                  <a href="#"><img src="http://placehold.it/360x240" alt=""></a>
                                </div>
                                <div class="caption">
                                  <h4>Praesent commodo</h4>
                                  <p>Nullam Condimentum Nibh Etiam Sem</p>
                                  <a class="btn btn-mini" href="#">&raquo; Read More</a>
                                </div>
                              </li>
                            </ul>
                          </div><!-- /Slide3 -->
                        </div>

                        <div class="control-box">
                          <a data-slide="prev" href="#myCarousel" class="carousel-control left">‹</a>
                          <a data-slide="next" href="#myCarousel" class="carousel-control right">›</a>
                        </div><!-- /.control-box -->

                      </div><!-- /#myCarousel -->



                </div>










            </div>










        </div>



    </div>




@endsection
