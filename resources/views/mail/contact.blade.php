<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Bryks</title>
</head>
<body>
    <style>
        .container{
            padding: 12px;
            background: whitesmoke;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
            min-height: 100vh;
        }
    </style>
    {{-- <p>Name:&nbsp; {{$data('name')}}</p> --}}
    <div class="container" style="display: flex; justify-content: center; align-items: center">
        <div class="card p-2">
            <div class="text-center">
                <img src="{{asset('images/logo.png')}}" height="100px" width="100px;" alt="">
            </div>
            <h5>Dear Admin,</h5>
            <p>You received the following contact form from {{$data['name']}}</p>
            <h6>Name:- {{$data['name']}}</h6>
            <h6>Email:- {{$data['email']}}</h6>
            <h6>Phone No: {{$data['phone_no']}}</h6>
            <div class="">
                <h6>Message:- </h6>
                <span style="color: blue; text-align: left; text-justify: auto; font-size: 12px">{{$data['message']}}</span>
            </div>
<hr>
            <div class="text-center">
                <img src="{{asset('images/logo.png')}}" height="100px" width="100px;" alt="">
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
