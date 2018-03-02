@extends('layouts.app')

@section('content')

<body class="bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-4 mb-1">
          <a href="{{route('categories.index',$category->id)}}" class="btn btn-info btn-block">
            Return</a>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Update category</h4>
          {{--dd($errors)--}}
          <form action="{{route('categories.update', $category->id)}}" method="POST" class="needs-validation" >
            @csrf
              @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="title">Title</label>
                        <input type="text" class="form-control @if($errors->has('title')) is-invalid @endif" id="title" name="title" value = "{{$value = old('title',$category->title)}}">
                        @if($errors->has('title'))
                        <div class="invalid-feedback">
                          {{$errors->first('title')}}
                        </div>
                        @endif
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Update</button>
            </form>
        </div>
      </div>
    </div>
</body>
@endsection
