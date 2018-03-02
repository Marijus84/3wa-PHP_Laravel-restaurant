@extends('layouts.app')

@section('content')

<body class="bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-4 mb-1">
          <a href="{{route('manufacturers.index')}}" class="btn btn-info btn-block">
            Return</a>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Create new entry</h4>
          {{--dd($errors)--}}
          <form action="{{route('manufacturers.store')}}" method="POST" class="needs-validation" >
            @csrf
                <div class="row ">
                    <div class="col-md-12 mb-3">
                        <label for="title">Title</label>
                        <input type="text" class="form-control @if($errors->has('title')) is-invalid @endif" id="title" name="title" value = "{{$value = old('title')}}">
                        @if($errors->has('title'))
                        <div class="invalid-feedback">
                          {{$errors->first('title')}}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-12 mb-3">
                        <label for="website">Website</label>
                        <input type="text" class="form-control @if($errors->has('website')) is-invalid @endif" id="website" name="website" value = "{{$value = old('website')}}">
                        @if($errors->has('website'))
                        <div class="invalid-feedback">
                          {{$errors->first('website')}}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-12 mb-3">
                        <label for="country">Country</label>
                        <input type="text" class="form-control @if($errors->has('country')) is-invalid @endif" id="country" name="country" value = "{{$value = old('country')}}">
                        @if($errors->has('country'))
                        <div class="invalid-feedback">
                          {{$errors->first('country')}}
                        </div>
                        @endif
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Create</button>
            </form>
        </div>
      </div>
    </div>
</body>
@endsection
