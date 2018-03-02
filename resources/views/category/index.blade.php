@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4 mb-1">
      <a href="{{route('home')}}" class="btn btn-info btn-block">
        Go to main page</a>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-4 mb-1">
      <a href="{{route('categories.create')}}" class="btn btn-primary btn-block">
        Create New Entry</a>
      </div>

    </div>
    <div class="row justify-content-center">
      <div class="col-md-12 mb-3">

      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
          </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
          <tr>
            <td>{{$category->id}}</td>
            <td><a href="{{route('categories.show',$category->id)}}">{{$category->title}}</a></td>
            <td>{{$category->created_at}}</td>
            <td>{{$category->updated_at}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

    </div>
    </div>
  </div>

@endsection
