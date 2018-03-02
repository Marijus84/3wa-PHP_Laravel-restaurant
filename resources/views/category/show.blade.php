@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4 mb-1">
      <a href="{{route('categories.index')}}" class="btn btn-info btn-block">
        Return</a>
    </div>
  </div>
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card text-center" style="margin-bottom:30px;" >
          <div class="card-body">
            <h4 class="card-title">{{$category->title}}</h4>
            <p class="card-text">ID:<span class="badge badge-success">{{$category->id}}</span></p>
            <p class="card-text">Created:<span class="badge badge-primary">{{$category->created_at}}</span></p>
            <p class="card-text">Updated:<span class="badge badge-secondary">{{$category->updated_at}}</span></p>
            <a href="{{route('categories.edit', $category->id)}}" class="btn btn-primary" style = "margin:15px;">
            Edit</a>
            <form  action="{{route('categories.destroy',$category->id)}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
