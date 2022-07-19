@extends('admin.master')
@section('title', 'About')
@section('content')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <div class="container">
        <h1 class="text-center font-extrabold text-4xl">About</h1>
        <div class="card mt-5">
            @php
                 $data = DB::table('about')->where('id', 1)->first();
            @endphp

            <form action="{{url('admin/save_about')}}" method="post">
                @csrf
                <textarea name="description" class="ckeditor form-control">{{$data->description}}</textarea>
              <input type="submit" class="btn btn-outline-success form-control" value="update">
          </form>
        </div>
    </div>
    <script>
        CKEDITOR.replace( 'ckeditor' );
      </script>
@endsection
