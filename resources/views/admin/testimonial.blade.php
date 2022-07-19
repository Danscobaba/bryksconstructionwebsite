@extends('admin.master')
@section('title', 'Manage Admin')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="container">
        <div class="card">
            <div class="mt-3 mx-3">
                <button class="btn btn-primary float-right mb-3" data-bs-toggle="modal" data-bs-target="#myModal">Add new
                    tetimony</button><br><br>
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title text-orange-600 text-center">Add New Testimony</h4>
                                {{-- <button type="button" class="btn-close text-orange-600" data-bs-dismiss="modal"></button> --}}
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div>
                                    <form id="project_type">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="name">Comment</label>
                                            <textarea class="form-control" name="testimony" id="testimony" cols="30" rows="10"></textarea>

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
            @if (Session::has('message'))
            <div class="alert alert-success text-center">{{ Session::get('message') }}</div>
        @endif
            <div class="table-responsive">
                <table class="table table-striped table-hover table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            {{-- <th>Mobile</th> --}}
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $data = DB::table('testimony');

                        @endphp
                        @if ($data->count() > 0)
                            @foreach ($data->get() as $i => $data)
                                <tr>
                                    <td scope="row">{{$i + 1}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->testimony}}</td>
                                    <td><a id="change_stat" data-id="{{ $data->id }}"
                                        data-value="{{ $data->status }}"
                                        class="btn change_stat  {{ $data->status == 0 ? 'btn-outline-danger' : 'btn-outline-primary' }}">{{ $data->status == 0 ? 'Deactive' : 'Active' }}</a></td>
                                    <td><a href="{{url('admin/delete_testimony/'.$data->id)}}" class="btn btn-danger">Delete</a></td>
                                </tr>
                            @endforeach

                        @else'
                            <tr>
                                <td>
                                    <h3 class="text-center">no data found</h3>
                                </td>
                            </tr>


                        @endif

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
                    url: "{{ url('admin/save_testimony') }}",
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
                            window.location = "{{ url('admin/testimony') }}"
                        }
                    }
                });
            });

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
                    url: "{{ url('admin/update_testimony') }}",
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



        });
    </script>
@endsection
