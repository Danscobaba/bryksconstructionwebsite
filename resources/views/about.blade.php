@extends('master')
@section('title', 'About-us|Bryks Contruction')
@section('content')
<style>
    p{
        font-size: 20px;
        font-family: 'Tiro Gurmukhi', serif;
        text-align: justify;
        line-height: 30px;
  /* text-justify: inter-word; */
    }
    .abo{
        background: url("{{asset('images/front/construction.jpg')}}");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover

    }
</style>
<div class="abo" style="width: 100%; color:white;  height: 20vh; display:flex; justify-content:center; align-items:center;  ">
   <h2 style="font-size: 36px; font-weight:900">ABOUT US</h2>
</div>
<div class="container">
<div style="padding: 10px">
    @php
    $data = DB::table('about')->where('id', 1)->first();
@endphp
{!!$data->description!!}
</div>
<div class="card " style="padding: 0 40px">
    <div class="card-header text-center">
        <h2 style=" font-family: 'Abril Fatface', cursive;">OUR SPECIALIZATIONS</h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                <div class="card text-center" style="display:flex; justify-content:center; width: 100%; max-height:200px; height:200px; ">
                    <h5 style="color:blue; padding:0.9em 0.4em"><i class="fas fa-hard-hat fa-4x fa-pull-center"></i>
                    </h5>
                    <h2 style="font-size: 20px">Building Construction</h2>
                </div>

            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                <div class="card text-center" style="display:flex; justify-content:center; width: 100%; max-height:200px; height:200px; ">
                    <h5 style="color:blue; padding:0.9em 0.4em"><i
                            class="fas fa-drafting-compass fa-4x fa-pull-center"></i></h5>
                    <h2 style="font-size: 18px">Civil Engineering and Infrastructure</h2>

                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-3">

                <div class="card text-center" style="display:flex; justify-content:center; width: 100%; max-height:200px; height:200px; ">
                    <h5 style="color:blue; padding:0.9em 0.4em"><i class="fas fa-city fa-4x fa-pull-center"></i>
                    </h5>

                    <h2 style="font-size: 20px">Real Estate Management</h2>
                </div>

            </div>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-3">

                <div class="card text-center" style="display:flex; justify-content:center; width: 100%; max-height:200px; height:200px; ">
                    <h5 style="color:blue; padding:0.9em 0.4em"><i
                            class="fas fa-binoculars fa-4x fa-pull-center"></i></h5>

                    <h2 style="font-size: 20px">General Merchandise</h2>
                </div>
            </div>

        </div>

    </div>

    <!-- End of services -->

</div>
</div>
@endsection


