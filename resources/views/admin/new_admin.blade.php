@extends('admin.master')
@section('title', 'Dashbord')
@section('content')
    <style>
        .cotainer {
            height: 90vh;
        }

        .gh {
            box-shadow: inset 0 -3em 3em rgba(0, 0, 0, 0.1),
                0 0 0 2px rgb(255, 255, 255),
                0.3em 0.3em 1em rgba(0, 0, 0, 0.3);
                padding: 12px 20px;
        }

        @media (max-width:490px) {
            .gh {
                width: 100%;
                padding: 12px 20px;
            }
        }
    </style>
    <div class="cotainer d-flex justify-center items-center">
        <div class="card gh w-3/4 px-12 py-9">
            <h2 class="mb-3 text-center">Create New Admin Account</h2>
            <form action="{{ url('admin/save_admin') }}" method="POST">
                @csrf
                <div class="mb-3 form-group">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" required name="name" id="floatingInput">
                        <label for="floatingInput">Full Name</label>
                    </div>
                </div>
                <div class="mb-3 form-group">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" required id="floatingInput" name="email"
                            placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                </div>
                <div class="mb-3 form-group">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" required id="floatingInput" name="password">
                        <label for="floatingInput">Password</label>
                    </div>
                </div>
                <div class="mb-3 form-group">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" required id="floatingInput" name="phone_no">
                        <label for="floatingInput">Phone No.</label>
                    </div>
                </div>
                <div class="mb-3 form-group">
                    <input type="submit" value="Create Account" class="btn btn-primary bg-blue-500 form-control">
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
