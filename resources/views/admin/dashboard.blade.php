@extends('admin.master')
@section('title', 'Dashbord')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .container {
            height: 100%;
            width: 100%;
            padding: 12px;

            align-items: center;
        }
    </style>
    <div class="container-fluid">
        {{-- <div class="row">
            <div class="col-md-4  my-3">
                <div class="card mx-2 ">
                    <div style="background: blueviolet; height:12px;"></div>
                    <div class="d-flex justify-between px-2 py-2">
                        <div class="">
                            <h2>Total Categories</h2>
                            <p class="text-center text-xl font-medium">60</p>
                        </div>
                        <p><span style="font-size: 26px; color:blueviolet;"><i class="bi bi-building"></i></span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4  my-3">
                <div class="card mx-2">
                    <div style="background: rgb(18, 153, 0); height:12px;"></div>
                    <div class="d-flex justify-between px-2 py-2">
                        <div class="">
                            <h2>Total Projects</h2>
                            <p class="text-center text-xl font-medium">60</p>
                        </div>
                        <p><span style="font-size: 26px; color:rgb(18, 153, 0);"><i class="bi bi-command"></i></span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4  my-3">
                <div class="card mx-2">
                    <div style="background: rgb(201, 204, 0); height:12px;"></div>
                    <div class="d-flex justify-between px-2 py-2">
                        <div class="">
                            <h2>Total Testimonials</h2>
                            <p class="text-center text-xl font-medium">60</p>
                        </div>
                        <p><span style="font-size: 26px; color:rgb(201, 204, 0);"><i class="bi bi-box2-heart"></i></span>
                        </p>
                    </div>
                </div>
            </div>
        </div> --}}
        <h1 class="font-extrabold text-orange-400 text-justify text-2xl text-muted ">Project Type</h1>

        <div>
            <button class="btn btn-primary float-right mb-3" data-bs-toggle="modal" data-bs-target="#myModal">Add new
                project type</button><br><br>
            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title text-orange-600 text-center">Add New Project Type</h4>
                            {{-- <button type="button" class="btn-close text-orange-600" data-bs-dismiss="modal"></button> --}}
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div>
                                <form id="project_type" action="#">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <input type="submit" class="form-control btn btn-outline-success btn-sm"
                                            value="Save">
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr  class="text-center" style="width: 100%">
                            <th>#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody style="width: 100%">

                        @php
                            $data = DB::table('type')->get();

                        @endphp
                        @foreach ($data as $index => $list)
                            <tr class="text-center" style="width: 100%">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $list->name }}</td>
                                <td> <button id="change_stat" data-id="{{ $list->id }}"
                                        data-value="{{ $list->status }}"
                                        class="btn change_stat  {{ $list->status == 0 ? 'btn-outline-danger' : 'btn-outline-primary' }}">{{ $list->status == 0 ? 'Deactive' : 'Active' }}</button>
                                </td>
                                <td><a data-id="{{ $list->id }}" data-name="{{ $list->name }}"
                                        class="btn btn-md btn-outline-info edit">Edit</a>
                                        <a href="{{url('admin/delete_project_type/'.$list->id)}}"
                                            class="btn btn-md btn-outline-danger">Delete</a>
                                    </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {

            $("#project_type").submit(function(e) {

                e.preventDefault();

                $.ajax({
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('admin/save_project_type') }}",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 401) {
                            Swal.fire({
                                icon: 'error',
                                title: response.error,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            // $(".spinner-border").css("display", "none");
                            // $(".login_btn").css("display", "block");
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1000
                            });
                            window.location = "{{ url('admin/dashboard') }}"
                        }
                    }
                });
            });





        });
    </script>
    <script>
        $(document).ready(function() {
            $(".change_stat").click(function(e) {
                e.preventDefault();
                // alert( "Handler for .click() called." );
                const id = $(this).data('id');
                const value = $(this).data('value');

                $.ajax({
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('update_project_type') }}",
                    data: {
                        "id": id,
                        "status": value == 1 ? 0 : 1,
                        "name": ''
                    },
                    // dataType: "dataType",
                    success: function(response) {
                        if (response.status == 401) {
                            Swal.fire({
                                icon: 'error',
                                title: response.error,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            // $(".spinner-border").css("display", "none");
                            // $(".login_btn").css("display", "block");
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                            window.location.reload(true);
                        }
                    }
                });
            });

            $(".edit").click(function(e) {
                e.preventDefault();
                const id = $(this).data('id');
                const name = $(this).data('name');
                const {
                    value: nar
                } = Swal.fire({
                    title: 'Edit Project Type',
                    input: 'text',
                    inputValue: name,
                    inputAttributes: {
                        autocapitalize: 'off'
                    },
                    showCancelButton: true,
                    confirmButtonText: 'Update',
                    showLoaderOnConfirm: true,
                    preConfirm: (nar) => {
                        if (nar != "") {
                            $.ajax({
                                type: "post",
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                        'content')
                                },
                                url: "{{ url('update_project_type') }}",
                                data: {
                                    "id": id,
                                    "name": nar
                                },
                                // dataType: "dataType",
                                success: function(response) {
                                    if (response.status == 401) {
                                        Swal.fire({
                                            icon: 'error',
                                            title: response.error,
                                            showConfirmButton: false,
                                            timer: 1500
                                        })
                                        // $(".spinner-border").css("display", "none");
                                        // $(".login_btn").css("display", "block");
                                    } else {
                                        Swal.fire({
                                            icon: 'success',
                                            title: response.message,
                                            showConfirmButton: false,
                                            timer: 1500
                                        });
                                        window.location.reload(true);
                                    }
                                }
                            });

                        }
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {

                    } else if (result.isDenied) {
                        Swal.fire('Changes are not saved', '', 'info')
                    }
                });



            });
        });
    </script>
@endsection
