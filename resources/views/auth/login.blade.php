@extends('auth.min')
@section('title', 'Login')
@section('content')
    <style>
        .ma {
            display: flex;
            justify-content: center;
            align-items: center
        }

        .form-container {
            /* border: 1px solid red; */
            width: 560px;
            padding: 20px;
            border-radius: 12px;

            box-shadow: rgba(3, 3, 124, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        }

        @media only screen and (max-width: 500px) {
            .form-container {
                width: 100%;
            }
        }
    </style>
    <div class="ma container">
        <div class="form-container">
            <div class="text-center flex justify-center">
                <img src="{{ asset('images/logo.png') }}" height="100px" width="100px" alt="">
            </div>
            <h2 class="text-center  font-bold uppercase font-serif text-xl">Login</h2>
            <form id="login_form" action="#">
                @csrf
                <div class="mb-3">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="mb-3">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control" name="password" id="pass">
                </div>
                <a class="text-blue-500 mb-2" href="{{ route('forget.password.get') }}">Forgot password?</a>
                <div class="mb-3">
                    <input type="submit" class="login_btn form-control" value="Login">
                    <div class="d-flex spin justify-content-center">
                        <div class="spinner-border text-primary" role="status">
                            <span class="">Processing...</span>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $(".spinner-border").css("display", "none");
            $("#login_form").submit(function(e) {
                // $(".login_btn").val("please wait.....")
                e.preventDefault();
                $(".spinner-border").css("display", "block");
                $(".login_btn").css("display", "none");

                $.ajax({
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('login_login') }}",
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
                            $(".spinner-border").css("display", "none");
                            $(".login_btn").css("display", "block");
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: response.success,
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
