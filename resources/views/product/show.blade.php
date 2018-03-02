@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-12">
          @component('components/card',['product' => $product,
                                          'admin'=> true])
          @endcomponent
          </div>

      </div>
    </div>
</div>
@endsection
