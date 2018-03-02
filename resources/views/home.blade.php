@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4 mb-1">
      <a href="{{route('categories.index')}}" class="btn btn-info btn-block">
        Go to categories list</a>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-4 mb-1">
      <a href="#" class="btn btn-info btn-block">
        Go to manufacturers list</a>
    </div>
  </div>

  @auth
  <div class="row">
    <div class="col-md-12 mb-3">
      <a href="{{route('products.create')}}" class="btn btn-primary btn-block">
        Create New Product</a>
      </div>
  @else
  Neprisijunges
  @endif

  <div class="row justify-content-center">
    <div class="col-md-12 mb-3">
  <form class="form-inline">
    <div class="form-group mx-sm-3 mb-2">
      <input type="text" class="form-control" id="seach" placeholder="Search...">
    </div>
    <button type="submit" class="btn btn-primary mb-2">Find</button>
  </form>
</div>
</div>
    </div>
    <div class="row justify-content-center">
        @foreach($products as $product)
        {{--dd ($products)--}}

        <div class="col-md-4">
          @component('components/card',['product' => $product,
                                        'admin'=> false])
          @endcomponent
          <!-- is vaizdo perduodam produkta i komponentus -->
          </div>

        @endforeach
      </div>
    </div>
</div>
@endsection
