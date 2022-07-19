<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{{csrf_token()}}">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Russo+One&family=Tiro+Gurmukhi&family=Unna:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/flowbite.min.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}"> --}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
</head>
<body>
<style>
    *{
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
    }
    .container-fluid{
        background: whitesmoke;
        border: 1px solid;
        height: 100vh;
        font-size: 18px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<div class="container-fluid">
    @yield('content')
</div>




{{-- <script src="{{ asset('js/flowbite.js') }}"></script> --}}
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" referrerpolicy="no-referrer"></script>
{{-- <script src="{{asset('js/toastr.min.js')}}"></script> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
</body>
</html>
