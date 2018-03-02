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
      <a href="{{route('manufacturers.create')}}" class="btn btn-primary btn-block">
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
            <th scope="col">Country</th>
            <th scope="col">Website</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
          </tr>
        </thead>
        <tbody>
        @foreach($manufacturers as $manufacturer)
          <tr>
            <td>{{$manufacturer->id}}</td>
            <td><a href="{{route('manufacturers.show',$manufacturer->id)}}">{{$manufacturer->title}}</a></td>
            <td>{{$manufacturer->country}}</td>
            <td>{{$manufacturer->website}}</td>
            <td>{{$manufacturer->created_at}}</td>
            <td>{{$manufacturer->updated_at}}</td>
            <td>
            <a href="{{route('manufacturers.edit', $manufacturer->id)}}" class="btn btn-primary" >
            Edit</a></td>
            <td>
            <form  action="{{route('manufacturers.destroy',$manufacturer->id)}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    </div>
    </div>
  </div>

@endsection
