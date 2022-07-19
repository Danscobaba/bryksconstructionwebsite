@extends('admin.master')
@section('title', 'Manage Admin')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <div class="container">
        <div class=" card mt-3 p-3" style="width: 100%">
            <div class="mt-3">
                <button class="btn btn-primary float-right mb-3" data-bs-toggle="modal" data-bs-target="#myModal">Add new
                    project</button><br><br>
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title text-orange-600 text-center">Add New Project Type</h4>
                                {{-- <button type="button" class="btn-close text-orange-600" data-bs-dismiss="modal"></button> --}}
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body" style="">
                                <div>
                                    <form id="project_type" action="{{ url('admin/save_project') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name">Title</label>
                                            <input type="text" name="title" id="name" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="name">Description</label>
                                            <input type="text" name="description" id="name" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="name">Project Type</label>
                                            @php
                                                $yh = DB::table('type')
                                                    ->where('status', 1)
                                                    ->get();
                                            @endphp

                                            <select name="project_type" class="form-control" id="">
                                                <option value="">Choose one ....</option>
                                                @foreach ($yh as $yh)
                                                    <option value="{{ $yh->id }}">{{ $yh->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="name">Upload Image</label>
                                            <input type="file" name="image" id="name" accept="image/*"
                                                onchange="loadFile(event)" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <img id="output" height="100px" />
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
            @if (Session::has('success'))
                <div class="alert alert-success text-center">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
            @endif
            <div class="">
                <table id="table_ih" class="table display nowrap table-striped" style="width:100%">
                    <thead class=" text-center">
                        <tr class="text-center" style="width: 100%">
                            <th>#</th>
                            <th>image</th>
                            <th>Name</th>

                            <th>Description</th>
                            <th>Project Type</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($data as $i => $list)
                            @php
                                $df = DB::table('type')
                                    ->where('id', $list->project_type)
                                    ->first();
                            @endphp
                            <tr class="text-center" style="width: 100%">
                                <td scope="row">{{ $i + 1 }}</td>
                                <td><span><img src="{{ asset('projects/' . $list->project_image) }}" height="70px"
                                            width="70px" alt=""></span></td>
                                <td>
                                    {{ $list->project_title }}</td>
                                <td>{{ $list->project_description }}</td>
                                <td>{{ $df->name }}</td>
                                <td><a data-id="{{ $list->id }}" data-value="{{ $list->status }}" id="change_stat"
                                        class=" btn {{ $list->status == 1 ? 'btn-outline-success' : 'btn-outline-danger' }} change_stat ">{{ $list->status == 1 ? 'Active' : 'Deactive' }}</a>
                                </td>
                                <td class=""><a class="btn btn-outline-info btn-sm mr-2"data-bs-toggle="modal"
                                        data-bs-target="#editModal" data-id="{{ $list->id }}"
                                        data-title="{{ $list->project_title }}"
                                        data-description="{{ $list->project_description }}"
                                        data-image="{{ asset('projects/' . $list->project_image) }}">Edit
                                        Project</a> <a href="{{ url('admin/delete_project/' . $list->id) }}"
                                        class="btn btn-outline-danger btn-sm">Delete</a></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content" style="border-radius: 12px; width:70vw">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Project</h5>
                                <button type="button" class="btn-close " data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                    <form id="project_uppdate" enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" name="id" hidden id="id">
                                        <div class="mb-3">
                                            <label for="name">Title</label>
                                            <input type="text" name="title" id="title" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="name">Description</label>
                                            <input type="text" name="description" id="desc"
                                                class="form-control">
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
                                            <input type="submit"
                                                class="form-control submit_ty btn btn-outline-success btn-sm"
                                                value="Save">
                                        </div>
                                    </form>

                            </div>
                            {{-- <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script>
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
     </script> --}}


    <script>
        $(document).ready(function() {
            $('#table_ih').DataTable({
                scrollX: true,
            });


            $(".change_stat").click(function(e) {
                e.preventDefault();
                const id = $(this).data('id');
                const value = $(this).data('value');


                $.ajax({
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('update_project') }}",
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
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
    <script>
        var exampleModal = document.getElementById('editModal')
        exampleModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var recipient = button.getAttribute('data-id')
            var title = button.getAttribute('data-title')
            var desc = button.getAttribute('data-description')
            var image = button.getAttribute('data-image')
            // var modalBodyInput = exampleModal.querySelector('.modal-body img')

            // modalTitle.textContent = 'New message to ' + recipient
            // modalBodyInput.src = recipient;
            exampleModal.querySelector('.modal-body #title').value = title
            exampleModal.querySelector('.modal-body #desc').value = desc
            exampleModal.querySelector('.modal-body #outputss').src = image
            exampleModal.querySelector('.modal-body #id').value = recipient

        })
        var loadFile = function(event) {
            var output = document.getElementById('outputss');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };

    </script>
    <script>
         $(document).ready(function() {
            $("#project_uppdate").submit(function(e) {
                e.preventDefault();
                var data = new FormData(this)
                $.ajax({
                    type: "post",
                    processData: false,
contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content')
                    },
                    url: "{{ url('update_project') }}",
                    data: data,
                    // beforeSend:function() {
                    //     $('submit_ty').attr("disabled", "disabled")
                    // },
                    // dataType: "json",
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
