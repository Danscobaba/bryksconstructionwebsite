@if (session()->has('uid'))
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="_token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <link
            href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Russo+One&family=Tiro+Gurmukhi&family=Unna:ital,wght@0,400;0,700;1,400;1,700&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
            referrerpolicy="no-referrer" />
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

        <link href="{{ asset('css/flowbite.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css"> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    </head>

    <body>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
        </style>
        <style>
            body {

                min-height: 100vh;

                width: 100%;
                overflow-x: hidden;
            }

            .sidebar {
                width: 200px;
                position: fixed;
                background: white;
                height: 100vh;
                top: 0;
                box-shadow: rgba(0, 0, 0, 0.3) 0px 8px 6px 8px;
            }

            .wrapper {
                margin-left: 200px;
                width: calc(100% - 200px);

                /* transition: 0.5s */

            }



            .wrapper .header {
                background: white;
                position: sticky;
                z-index: 100;
                /* width: 100%; */
                right: 0;
                height: 70px;
                top: 0;
                left: 262px;
                padding: 0 20px;
                align-items: center;
                /* //transition: 0.5s; */
                /* box-shadow: rgba(0, 0, 0, 0.3) 0px 3px 8px; */
                box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
            }

            .wrapper {
                /* transition: 0.5s; */
            }

            .sidebar.active {
                display: none;
            }

            .wrapper.active {
                margin-left: 0;
                width: 100%;
            }

            .wrapper .content {
                width: 100%
            }


            .sidebar-container {
                height: 100%;
                width: 100%;
                padding: 30px 0;
                display: flex;
                justify-content: center;
            }

            .sidebar-container ul li {
                color: rgb(49, 49, 114);
                margin-bottom: 30px;
                font-weight: 700;
                font-size: 16px;
            }

            .sidebar-container ul li a {
                text-decoration: none;
            }

            .sidebar-container ul li a span {
                margin-right: 16px;
                font-weight: 700;
            }

            @media('max-width:430px') {
                .wrapper {
                    width: 100%;
                }
            }
        </style>



        <div class="sidebar">

            <div class="text-center my-3 d-flex justify-center">
                <img src="{{ asset('images/logo.png') }}" alt="" height="60px" width="70px">
            </div>
            <div style="height: 2px; background:rgb(140, 39, 165);"></div>


            <div class="sidebar-container">

                <div class="sidebar-item">
                    <ul>
                        <li><a href="{{ url('admin/dashboard') }}"><span><i class="bi bi-tv"></i></span>Dashboard</a>
                        </li>
                        {{-- <li><a href="{{url('admin/project_type')}}"><span><i class="bi bi-bar-chart-steps"></i></span>Project Type</a></li> --}}
                        <li><a href="{{ url('admin/project') }}"><span><i class="bi bi-bezier"></i></span>All
                                Projects</a></li>
                        <li><a href="{{ url('admin/about') }}"><span><i class="bi bi-signpost"></i></span>About Us</a>
                        </li>
                        <li><a href="{{ url('admin/testimony') }}"><span><i
                                        class="bi bi-bookmark-star"></i></span>Testimonial</a></li>
                        <li><a href="{{ url('admin/setting') }}"><span><i class="bi bi-gear"></i></span>Site
                                Settings</a></li>
                        <li><a href="{{ url('admin/administrator') }}"><span><i
                                        class="bi bi-person-fill"></i></span>Administrators</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="wrapper">

            <div class="header d-flex justify-between">
                <div class="togle" style="height: 100%; display:flex; align-items:center;">
                    <input type="checkbox" hidden name="" id="tog">
                    <label for="tog" onclick="thyg()"> <span class="menu"
                            style="font-size: 24px; color: rgb(76, 40, 117)"><i class="bi bi-list"></i></span>
                        <span class="close" style="font-size: 24px; color: rgb(76, 40, 117)"><i
                                class="bi bi-box-arrow-left"></i></span></label>
                    &nbsp;
                </div>

                <div>
                    <div class="dropdown">
                        <a class="dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span style="font-size: 36px">
                                <i class="bi bi-person-circle"></i>
                            </span>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ url('logout') }}"><span class="text-xl mx-2"><i
                                            class="bi bi-power"></i></span>Logout</a></li>
                            {{-- <li><a class="dropdown-item" href="#">Another action</a></li> --}}

                        </ul>
                    </div>

                </div>

            </div>
            <div class="content" style="   ">
                @yield('content')
            </div>
        </div>



        <script type="text/javascript">
            let togle = document.querySelector(".togle");
            let sidebar = document.querySelector(".sidebar");
            let wrapper = document.querySelector(".wrapper");
            let menu = document.querySelector(".menu");
            let close = document.querySelector(".close");

            document.querySelector("#tog").style.display = 'none';
            // document.querySelector("#tog").checked=false;
            menu.style.display = "none";
            close.style.display = "block";

            function thyg() {

                var btn_tog = document.querySelector("#tog").checked;


                if (btn_tog == true) {
                    btn_tog = false;
                    menu.style.display = "block";
                    close.style.display = "none";
                    sidebar.classList.add("active");
                    wrapper.classList.add("active");
                    document.querySelector(".header").style.left = "0";
                    //  document.querySelector(".header").style


                } else {
                    btn_tog = true;
                    close.style.display = "block";
                    menu.style.display = "none";
                    sidebar.classList.remove("active");
                    wrapper.classList.remove("active");
                    document.querySelector(".header").style.left = "262px";
                }


            }

            var restt = window.matchMedia("(max-width: 900px)");

            function gth(res) {
                var btn_tog = document.querySelector("#tog").checked;
                if (res.matches) {
                    btn_tog = false;
                    menu.style.display = "block";
                    close.style.display = "none";
                    sidebar.classList.add("active");
                    wrapper.classList.add("active");
                    document.querySelector(".header").style.left = "0";
                } else {
                    document.querySelector("#tog").checked = true;
                    btn_tog = true;
                    close.style.display = "block";
                    menu.style.display = "none";
                    sidebar.classList.remove("active");
                    wrapper.classList.remove("active");
                    document.querySelector(".header").style.left = "262px";
                }
            }

            gth(restt);
            restt.addListener(gth);
            // console.log( document.querySelector("#tog").checked);
        </script>
        <script src="{{ asset('js/flowbite.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" referrerpolicy="no-referrer">
        </script>

        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
        <script src="{{ asset('js/popper.min.js') }}"></script>

    </body>

    </html>
@else
    <script>
        window.location = "{{ url('admin-login') }}";
    </script>
@endif
