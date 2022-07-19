@extends('master')
@section('title', 'projects|Bryks Contruction')
@section('content')
    <style>
        .pro {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            object-fit: contain
        }

        .image {
            position: relative;
            flex: 1;
            overflow: hidden;
        }

        .image img {
            opacity: 0.8;
            position: relative;
            height: 300px;
            max-height: 300px;
            vertical-align: top;
            transition: transform 3s;
            /* transition-property: opacity; */
        }

        .image:hover img {
            opacity: 1;
            transform: scale(1.5)
        }

        .image .details {
            z-index: 100;
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            padding: 10px;
            color: white;
        }

        .image .details h4 {

            display: flex;

            border-radius: 9px;
            justify-content: flex-end
        }

        .image .details h4 span {
            border: 2px solid white;
            border-radius: 12px;
            padding: 5px;
            font-weight: 700;
            color: blue;

        }

        .image .details h1 {
            text-align: center;
            margin-top: 200px;
            text-transform: uppercase;
            font-weight: 700;
        }

        .modal {
            border-radius: 12px;
        }

        .modal-body {
            overflow: hidden;
            padding: 0;
        }

        .modal-body img {
            width: 100%;
            transition: transform 3s;
        }

        .modal-body img:hover {
            transform: scale(1.5);
        }
    </style>
    <div class="container p-3 flex justify-center items-center">

        @php
            $ty = DB::table('projects')
                ->where('status', 1)
                ->get();
        @endphp
        <div class="row">

            @foreach ($ty as $ty)
                @php
                    $list = DB::table('type')
                        ->where('id', $ty->project_type)
                        ->first();
                @endphp
                <div class="col-12 col-md-6 col-sm-12 mb-3">
                    <div class="image" data-title="{{ $ty->project_title }}" data-desc="{{ $ty->project_description }}" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        data-bs-whatever="{{ asset('projects/' . $ty->project_image) }}">
                        <img class="mh-100 h-full min-w-full" src="{{ asset('projects/' . $ty->project_image) }}"
                            width="100%" alt="img 2">
                        <div class="details">
                            <h4><span>{{ $list->name }}</span></h4>
                            <h1>{{ $ty->project_title }}</h1>
                            {{-- <p class="text-center">{{$ty->project_description}}</p> --}}
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src='' alt=''>
                        <div class='text-center'>
                            <h2 class="text-2xl text-orange-800 uppercase " style="font-weight: 800; font-size:28px"></h2>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <hr>
    <div class="card " style="padding: 0 40px">
        <div class="card-header text-center">
            <h2 style=" font-family: 'Abril Fatface', cursive;">OUR SPECIALIZATIONS</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                    <div class="card text-center"
                        style="display:flex; justify-content:center; width: 100%; max-height:200px; height:200px; ">
                        <h5 style="color:blue; padding:0.9em 0.4em"><i class="fas fa-hard-hat fa-4x fa-pull-center"></i>
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
                        <h5 style="color:blue; padding:0.9em 0.4em"><i class="fas fa-binoculars fa-4x fa-pull-center"></i>
                        </h5>

                        <h2 style="font-size: 20px">General Merchandise</h2>
                    </div>
                </div>

            </div>

        </div>

        <!-- End of services -->

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var recipient = button.getAttribute('data-bs-whatever')
            var title = button.getAttribute('data-title')
            var desc = button.getAttribute('data-desc')
            var modalBodyInput = exampleModal.querySelector('.modal-body img')

            // modalTitle.textContent = 'New message to ' + recipient
            modalBodyInput.src = recipient;
            exampleModal.querySelector('.modal-body h2').innerText = title
            exampleModal.querySelector('.modal-body p').innerText = desc
        })

        // $(".image").click(function (e) {
        //     e.preventDefault();
        //     const id = $(this).data('id');
        //     $.ajax({
        //         type: "",
        //         url: "{{ url('get_project_details') }}",
        //         data: "data",
        //         dataType: "dataType",
        //         success: function (response) {

        //         }
        //     });
        // });
    </script>
@endsection
