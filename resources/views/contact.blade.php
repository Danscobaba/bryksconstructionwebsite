@extends('master')
@section('title', 'Contact-us|Bryks Contruction')
@section('content')
    {{-- <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" /> --}}
    <style>
        .hero {
            height: 100px;
            /* background-color: red; */
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url("{{ asset('images/front/construction.jpg') }}");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover
        }

        .abo {
            background: url("{{ asset('images/front/construction.jpg') }}");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover
        }

        .hero h2 {
            font-size: 36px;
            font-weight: 700;
            line-height: 36px;
            color: white;
        }

        .container {
            padding: 20px;
            background: whitesmoke;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            width: 500px;
            padding: 12px 20px;
            border-radius: 12px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3)
        }

        label {
            font-size: 24px;
            color: blue;
            font-weight: 900;
        }
    </style>
    <div class="hero">
        <h2 class="uppercase">Contact Us</h2>
    </div>
    <hr>
    <div class="container">

        <div class="card">
            <div class="text-blue-800 text-center mt-4" style="width: 100%">
                @php
                    $dt = DB::table('site_settings')
                        ->where('id', 1)
                        ->first();
                @endphp
                <div class="flex text-center">
                    <h5 class="text-xl font-bold">Email Address:</h5>&nbsp; &nbsp;
                    <p class="text-xl font-bold">{{ $dt->email }}</p>
                </div>
                <div class="flex">
                    <h5 class="text-xl font-bold">Tel:</h5>&nbsp; &nbsp;
                    <p class="text-xl font-bold">{{ $dt->phone_no }}</p>
                </div>
                <div class="flex ">
                    <h5 class="text-xl font-bold">Office Address:</h5> &nbsp; &nbsp;
                    <p class="text-xl font-bold">{{ $dt->address }}</p>
                </div>

            </div>
            <p class="text-center text-muted">OR</p>
            <hr>
            {!! Form::open(['route' => 'contact.submit']) !!}
            <h3>Send Us Mail</h3>

            @if (session()->has('message'))
                <div class=" text-center alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <form>
                <legend title="Contact">

                    <div class="relative mb-3">
                        <input type="text" id="floating_outlined" name="name"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="floating_outlined"
                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Name</label>
                    </div>
                    <div class="relative mb-3">
                        <input type="email" id="floating_outlined" name="email"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="floating_outlined"
                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Email
                            Address</label>
                    </div>

                    <div class="relative mb-3">
                        <input type="text" id="floating_outlined" name="phone_no"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="floating_outlined"
                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Phone
                            No.</label>
                    </div>

                    <div class="relative mb-3">
                        <textarea name="message" id="floating_outlined" name="message"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            cols="30" rows="10"></textarea>
                        <label for="floating_outlined"
                            class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-800 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Message</label>
                    </div>

                    <div class="form-group mb-3">
                        <button type="submit"
                            class="form-control text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Submit</button>

                    </div>
                </legend>

            </form>

            {!! Form::close() !!}
        </div>
    </div>
    {{-- <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script> --}}
@endsection('content')
