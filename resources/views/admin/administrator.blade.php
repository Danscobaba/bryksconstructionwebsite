@extends('admin.master')
@section('title', 'Manage Admin')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="container " style="padding: 12px">
        <button class="mb-3 float-right btn btn-outline-info" onclick="window.location ='{{ url('create_admin') }}'">Create
            new</button>
        <div class="card">
            @if (Session::has('message'))
                <div class="alert alert-success text-center">{{ Session::get('message') }}</div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped table-hover table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $data = DB::table('users')
                                ->orderBy('id', 'desc')
                                ->get();
                        @endphp
                        @foreach ($data as $i => $data)
                            <tr>
                                <td scope="row">{{ $i + 1 }}</td>
                                <td>{{ $data->username }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->phone_no }}</td>
                                <td><a data-id="{{ $data->id }}" data-value="{{ $data->status }}" id="change_stat"
                                        class="btn change_stat {{ $data->status == 0 ? 'btn-danger' : 'btn-success' }}">{{ $data->status == 0 ? 'Deactive' : 'Active' }}</a>
                                </td>
                                <td> <a href="{{ url('admin/delete_admin/' . $data->id) }}"
                                        class="btn btn-outline-danger">Delete</a></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            {{-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content" style="border-radius: 12px; width:70vw">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Project</h5>
                            <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <form id="project_update" action="{{ url('update_project') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="id" hidden id="id">
                                    <div class="mb-3">
                                        <label for="name">Title</label>
                                        <input type="text" name="title" id="title" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="name">Description</label>
                                        <input type="text" name="description" id="desc" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="name">Upload Image</label>
                                        <input type="file" name="image" id="image" accept="image/*"
                                            onchange="loadFile(event)" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <img id="outputss" height="70px" width="70px" />
                                    </div>

                                    <div class="mb-3">
                                        <input type="submit" class="form-control btn btn-outline-success btn-sm"
                                            value="Save">
                                    </div>
                                </form>
                            </div>

                        </div>
                        {{-- <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {



            $(".change_stat").click(function(e) {
                e.preventDefault();
                const id = $(this).data('id');
                const value = $(this).data('value');


                $.ajax({
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('admin/update_admin_status') }}",
                    data: {
                        "id": id,
                        "status": value == 1 ? 0 : 1,
                        "title": ''
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

            })
        });
    </script>
@endsection
