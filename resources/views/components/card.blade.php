<div class="card" style="margin-bottom:30px;" >
  <img class="card-img-top" src="https://loremflickr.com/g/320/240/paris" alt="Card image cap">
  <div class="card-body">
    <h4 class="card-title">{{$product->title}}</h4>
    <p class="card-text">
      Price:
      <span class="badge badge-success">{{$product->price}}</span></p>
    <p class="card-text">
      Quantity:
      <span class="badge badge-primary">{{$product->quantity}}</span></p>

      @if(isset($product->categories))
        <p class="card-text">
          Category:
          <span class="badge badge-secondary">{{$product->categories->title}}</span></p>
      @endif

    <p class="card-text">
      Manufacturer:
      <span class="badge badge-secondary">{{$product->manufacturers->title}}</span></p>
    <p class="card-text">
      {{str_limit($product->description,100)}}</p>

      @if($admin == false)
    <a href="{{route('products.show', $product->id)}}" class="btn btn-primary">
    Read more</a>
      @else
    <a href="{{route('products.edit', $product->id)}}" class="btn btn-primary">
    Edit</a>
    <form  action="{{route('products.destroy',$product->id)}}" method="POST">
      @csrf
      @method('DELETE')
      <button type="sybmit" class="btn btn-danger">Delete</button>
    </form>
    @endif
  </div>
  </div>
