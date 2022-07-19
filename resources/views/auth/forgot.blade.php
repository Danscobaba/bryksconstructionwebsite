@extends('auth.min')
@section('title', 'forgot password')
@section('content')

  <div class="container d-flex justify-center">

              <div class="card" style="width: 600px">
                <a href="{{url('admin-login')}}" class="btn btn-outline-primary">back to login</a>
                  <div class="card-header text-center">Reset Password</div>
                  <div class="card-body">

                    @if (Session::has('message'))
                         <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                      <form action="{{ route('forget.password.post') }}" method="POST">
                          @csrf
                          <div class="form-group mb-3">
                              <label for="email_address" class="">E-Mail Address</label>
                              <div class="">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="mb-3">
                              <button type="submit" class="btn btn-primary form-control">
                                  Send Password Reset Link
                              </button>
                          </div>
                      </form>

                  </div>
              </div>

  </div>

@endsection
