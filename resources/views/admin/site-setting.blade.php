@extends('admin.master')
@section('title', 'Manage Admin')
@section('content')
    <div class="container">
        <div class="card px-10 py-4">
            <h1 class="font-extrabold text-2xl text-blue-700 text-center mb-3">General Settings</h1>
            @php
                $data = DB::table('site_settings')->where('id', 1)->first();
            @endphp
           <form id="settings">
            @csrf
            <div class="mb-3">
                <label for="">Company Address</label>
                <input type="text" class="form-control" name="address" value="{{$data->address}}" id="">
            </div>
            <div class="mb-3">
                <label for="">Company Email</label>
                <input type="text" class="form-control" name="email" value="{{$data->email}}" id="">
            </div>
            <div class="mb-3">
                <label for="">Company Phone No.</label>
                <input type="text" class="form-control" name="phone_no" value="{{$data->phone_no}}" id="">
            </div>
            <div class="mb-3">
                <label for="">Fb Link</label>
                <input type="text" class="form-control" name="fb_link" value="{{$data->fb_link}}" id="">
            </div>
            <div class="mb-3">
                <label for="">Instagram Link</label>
                <input type="text" class="form-control" name="instagram_link" value="{{$data->instagram_link}}" id="">
            </div>
            <div class="mb-3">
                <label for="">Twitter Link</label>
                <input type="text" class="form-control" name="twitter_link" value="{{$data->twitter_link}}" id="">
            </div>
            <div class="mb-3">
                <label for="">Linkedin Link</label>
                <input type="text" class="form-control" name="linkedin" value="{{$data->linkedin}}" id="">
            </div>
            <div class="mb-3">
                <label for="">Youtube Link</label>
                <input type="text" class="form-control" name="youtube" value="{{$data->youtube}}" id="">
            </div>
            <div class="mb-3">
                <label for="">Testimonial Status</label>
                <select name="testimony_status" class="form-control" id="">
                    <option value="1" {{$data->testimony_status == 1 ? 'selected' : ''}}>Active</option>
                    <option value="0" {{$data->testimony_status == 0 ? 'selected' : ''}}>Deactive</option>
                </select>
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control btn btn-outline-primary" value="Update">
            </div>

</form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {

            $("#settings").submit(function(e) {

                e.preventDefault();

                $.ajax({
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('admin/save_site_settings') }}",
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
@endsection
