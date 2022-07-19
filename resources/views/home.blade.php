@extends('master')
@section('title', 'Home')
@section('content')
    <script src="https://kit.fontawesome.com/c8025c2b12.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/owl-carousel.min.css') }}" rel="stylesheet">
    <style>
        .nj {
            width: 100%;
            height: 90vh;
            background: rgba(122, 122, 255, 0.2);
            position: absolute;
            top: 130px;

            color: #fff;
            text-align: center;
            font-weight: 900;
        }

        .brand {
            font-size: 55px;
            line-height: 70px;
            text-transform: uppercase;
            font-weight: 900
        }

        .wrapper {
            width: 100%;
        }

        .wrapper .carousel {

            margin: auto;
            padding: 0 30px;
        }

        .wrapper .carousel .cardiu {
            /* background: red; */
            margin: 20px 0;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3)
        }

        .hero-header {
            width: 100%;
        }

        .hero-header .hero-carousel {
            min-width: 100%;
            margin: auto;
            padding: 0;
        }

        .hero-header .hero-carousel .hero-body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;

        }

        .hero-header .hero-carousel .first {
            background: url("{{ asset('images/work/p/7.jpg') }}");

            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .hero-header .hero-carousel .second {
            background: url("{{ asset('images/front/02.jpg') }}");

            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .hero-header .hero-carousel .third {
            background: url("{{ asset('images/front/01.png') }}");

            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .jacob{
                font-size: 38px; line-height:36px;
            }
        .hero-header .hero-carousel .fourth {
            background: url("{{ asset('images/work/p/12.jpg') }}");

            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        // @media (max-width:) {

        // }
        .slj {
            height: 442px;
        }

        abou {
            margin: 0 50px;
        }

        @media (max-width:990px) {
            .nj {
                width: 100%;
                height: 90vh;
                background: rgba(122, 122, 255, 0.2);
                position: absolute;
                top: 130px;

                color: #fff;
                text-align: center;
                font-weight: 900;
            }

            .brand {
                font-size: 36px;
                line-height: 70px;
                text-transform: uppercase;
                font-weight: 900
            }

        }

        @media (max-width:600px) {
            .slj {
                height: 256px;
            }

            .brand {
                font-size: 24px;
                line-height: 36px;
                text-transform: uppercase;
                font-weight: 900
            }

            .hero-btn {
                font-size: 14px;
            }
            .jacob{
                font-size: 24px; line-height:24px;
            }
        }
    </style>
    <div class="hero-header">
        <div class="hero-carousel owl-carousel">
            <div class="hero-body first">
                <div class="text-center text-white">
                    <h1 class="brand">Bryks <br> Construction Company LTD</h1>

                    <div class="d-flex justify-content-center m-4">
                        <button " onclick="location.href='{{ url('about') }}';" class="btn hero-btn btn-sm text-center mx-4 text-white btn-primary mr-10">About
                                Us</button>
                            <button " onclick="location.href='{{ url('contact-us') }}';"
                            class="btn hero-btn btn-sm text-center text-blue-800 btn-success ml-10 hover:bg-blue-800 hover:text-white">Contact
                            Us</button>
                    </div>
                </div>
            </div>
            <div class="hero-body second">
                <div class="text-center text-white">
                    <h1 class="brand">Bryks <br> Construction Company LTD</h1>

                    <div class="d-flex justify-content-center m-4">
                        <button " onclick="location.href='{{ url('about') }}';" class="btn hero-btn btn-sm text-center mx-4 text-white btn-primary mr-10">About
                                Us</button>
                            <button " onclick="location.href='{{ url('contact-us') }}';"
                            class="btn hero-btn btn-sm text-center text-blue-800 btn-success ml-10 hover:bg-blue-800 hover:text-white">Contact
                            Us</button>
                    </div>
                </div>
            </div>
            <div class="hero-body third">
                <div class="text-center text-white">
                    <h1 class="brand">Bryks <br> Construction Company LTD</h1>

                    <div class="d-flex justify-content-center m-4">
                        <button " onclick="location.href='{{ url('about') }}';" class="btn hero-btn btn-sm text-center mx-4 text-white btn-primary mr-10">About
                                Us</button>
                            <button " onclick="location.href='{{ url('contact-us') }}';"
                            class="btn hero-btn btn-sm text-center text-blue-800 btn-success ml-10 hover:bg-blue-800 hover:text-white">Contact
                            Us</button>
                    </div>
                </div>
            </div>
            <div class="hero-body fourth">
                <div class="text-center text-white">
                    <h1 class="brand">Bryks <br> Construction Company LTD</h1>

                    <div class="d-flex justify-content-center m-4">
                        <button " onclick="location.href='{{ url('about') }}';" class="btn hero-btn btn-sm text-center mx-4 text-white btn-primary mr-10">About
                                Us</button>
                            <button " onclick="location.href='{{ url('contact-us') }}';"
                            class="btn hero-btn btn-sm text-center text-blue-800 btn-success ml-10 hover:bg-blue-800 hover:text-white">Contact
                            Us</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="text-center w-full">
            <p class="text-center" style="font-size: 11px; font-family: cursive;">Know us more</p>
            <h3 class="text-center" style=" font-family: 'Abril Fatface', cursive;">About Us</h3>
            <p class="text-center abou" style="width: 100%; font-size: 1.6rem;">
                <span>Bryks</span> Construction Company is a full service, building and construction (residential and
                commercial) contracting company that is located in Ibadan, Oyo State, Nigeria.
                <a class="readmore" href="{{ url('about') }}" style="  border-radius: 12px; padding: 5px;"><i
                        class="bi bi-arrow-right-short"></i>More</a>
            </p>
        </div>

        <div class="container">
            <div class="card-header text-center">
                <h2 style=" font-family: 'Abril Fatface', cursive;">Our Projects</h2>
            </div>
            <div class="wrapper">
                <div class="carousel owl-carousel">
                    <div class="cardiu">
                        <div class="" style="height: 250px; max-height: 250px">
                            <img class="mh-100 h-full" src="{{ asset('images/project/canam-intersand-1024x576.jpg') }}"
                                height="250px" width="250px" alt="img 1">
                        </div>


                    </div>
                    <div class="cardiu">
                        <div class="" style="height: 250px; max-height: 250px">
                            <img class="mh-100 h-full" src="{{ asset('images/work/p/11.jpg') }}" class="mh-100"
                                height="100px" width="150px" alt="img 2">
                        </div>
                    </div>
                    <div class="cardiu">
                        <div class="" style="height: 250px; max-height: 250px">
                            <img class="mh-100 h-full" src="{{ asset('images/work/p/0.jpg') }}" class="mh-100"
                                height="100px" width="150px" alt="img 2">
                        </div>
                    </div>
                    <div class="cardiu">
                        <div class="" style="height: 250px; max-height: 250px">
                            <img class="mh-100 h-full" src="{{ asset('images/work/p/1.jpeg') }}" class="mh-100"
                                height="100px" width="150px" alt="img 2">
                        </div>
                    </div>
                    <div class="cardiu">
                        <div class="" style="height: 250px; max-height: 250px">
                            <img class="mh-100 h-full" src="{{ asset('images/work/p/13.jpg') }}" class="mh-100"
                                height="100px" width="150px" alt="img 2">
                        </div>
                    </div>
                </div>
                <!-- <carousel [margin]="30" [loop]="true"  [cellsToShow]="3" [autoplay]="true">
                                                                                                                                                    <div class="carousel-cell">
                                                                                                                                                      <img src="assets/img/work/p/11.jpg" alt="img 2">
                                                                                                                                                    </div>
                                                                                                                                                    <div class="carousel-cell">
                                                                                                                                                      <img src="assets/img/work/p/11.jpg" alt="img 2">
                                                                                                                                                  </div>
                                                                                                                                                  <div class="carousel-cell">
                                                                                                                                                    <img src="assets/img/work/p/11.jpg" alt="img 2">
                                                                                                                                                </div>
                                                                                                                                                <div class="carousel-cell">
                                                                                                                                                  <img src="path_to_image">
                                                                                                                                              </div>
                                                                                                                                              <div class="carousel-cell">
                                                                                                                                                <img src="path_to_image">
                                                                                                                                              </div>
                                                                                                                                                </carousel> -->
            </div>

        </div>

        <hr>
        <!-- services -->
        <div class="card " style="padding: 0 40px">
            <div class="card-header text-center">
                <h2 style=" font-family: 'Abril Fatface', cursive;">OUR SPECIALIZATIONS</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                        <div class="card text-center"
                            style="display:flex; justify-content:center; width: 100%; max-height:200px; height:200px; ">
                            <h5 style="color:blue; padding:0.9em 0.4em"><i
                                    class="fas fa-hard-hat fa-4x fa-pull-center"></i>
                            </h5>
                            <h2 style="font-size: 20px">Building Construction</h2>
                        </div>

                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                        <div class="card text-center"
                            style="display:flex; justify-content:center; width: 100%; max-height:200px; height:200px; ">
                            <h5 style="color:blue; padding:0.9em 0.4em"><i
                                    class="fas fa-drafting-compass fa-4x fa-pull-center"></i></h5>
                            <h2 style="font-size: 18px">Civil Engineering and Infrastructure</h2>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-3">

                        <div class="card text-center"
                            style="display:flex; justify-content:center; width: 100%; max-height:200px; height:200px; ">
                            <h5 style="color:blue; padding:0.9em 0.4em"><i class="fas fa-city fa-4x fa-pull-center"></i>
                            </h5>

                            <h2 style="font-size: 20px">Real Estate Management</h2>
                        </div>

                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-3">

                        <div class="card text-center"
                            style="display:flex; justify-content:center; width: 100%; max-height:200px; height:200px; ">
                            <h5 style="color:blue; padding:0.9em 0.4em"><i
                                    class="fas fa-binoculars fa-4x fa-pull-center"></i></h5>

                            <h2 style="font-size: 20px">General Merchandise</h2>
                        </div>
                    </div>

                </div>

            </div>

            <!-- End of services -->

        </div>
        <hr>
        @php
            $jk = DB::table('site_settings')
                ->where('id', 1)
                ->first();
        @endphp
        @if ($jk->testimony_status == 1)
        <div class="card-header text-center">
            <h2 style=" font-family: 'Abril Fatface', cursive;">Testimonial</h2>
        </div>
            <div class="container flex justify-center ">
                
                <div class="carouselss owl-carousel" style=" max-width:600px">
                    @php
                        $jks = DB::table('testimony')
                            ->where('status', 1)
                            ->get();
                    @endphp

                    <div class="card px-5 py-3">
                        @foreach ($jks as $jks )

                            <div class="text-center" style="">
                                <p class="jacob" style="">{{$jks->testimony}}</p>
                                <br>
                                <p class="text-muted italic font-medium text-lg" style="">{{$jks->name}}</p>
                            </div>

                        @endforeach

                    </div>
                </div>
            </div>
        @endif

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/owl-carousel.min.js') }}"></script>

        <script>
            $(".carousel").owlCarousel({
                margin: 14,
                loop: true,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    500: {
                        items: 2,
                        nav: false
                    },
                    600: {
                        items: 2,
                        nav: false
                    },
                    1000: {
                        items: 3,
                        nav: false
                    },
                }
            });
            $(".carouselss").owlCarousel({
                margin: 14,
                loop: true,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    500: {
                        items: 1,
                        nav: false
                    },
                    600: {
                        items: 1,
                        nav: false
                    },
                    1000: {
                        items: 1,
                        nav: false
                    },
                }
            });
            $(".hero-carousel").owlCarousel({
                margin: 0,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    600: {
                        items: 1,
                        nav: false
                    },
                    1000: {
                        items: 1,
                        nav: false
                    },
                }
            })
        </script>


    @endsection('content')
