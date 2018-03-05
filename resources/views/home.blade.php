@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 mb-1">
      <a href="{{route('categories.index')}}" class="btn btn-info btn-block">
        Go to categories list</a>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-8 mb-1">
      <a href="#" class="btn btn-info btn-block">
        Go to manufacturers list</a>
    </div>
  </div>

  <form action="{{ route('home') }}" method="GET">
    <div class="row">
          <div class="col-md-8 mb-3">
            <div class="input-group">
              <div class="input-group-prepend">
                <label class="input-group-text" for="categories">Options</label>
              </div>
              <select class="custom-select" id="categories" name="category">
                <option selected>Choose...</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" @if($category->id == Request::input('category')) selected @endif>{{ $category->title }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-4">
              <button type="submit" class="btn btn-primary btn-block">Filter</button>
          </div>
    </div>
  </form>

  @auth
  <div class="row justify-content-center">
    <div class="col-md-8 mb-1">
      <a href="{{route('products.create')}}" class="btn btn-success btn-block">
        Create New Product</a>
      </div>
  @else
  Neprisijunges
  @endif

  <div class="row justify-content-center">
    <div class="col-md-12 mb-3">

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
