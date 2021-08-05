<div class="card">
    <img src="{{asset($product->images->first()->path)}}" class="card-img-top" alt="{{$product->title}}" height="400">
    <div class="card-body">
        <h4 class="text-right"><strong>£{{$product->price}}</strong></h4>
      <h5 class="card-title">{{$product->title}}</h5>
      <p class="card-text">{{$product->description}}</p>
      

      @if (isset($cart))
        <p class="card-text">In cart({{$product->pivot->quantity}} item) <strong> Total: {{$product->total}}</strong></p>
          <form 
          class="d-inline"
          method="POST"
          action="{{route('products.carts.destroy',['product'=>$product->id,'cart'=>$cart->id])}}"
          >
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" type="submit">Delete from Cart</button>
      </form>
      @else
        <form 
          class="d-inline"
          method="POST"
          action="{{route('products.carts.store',['product'=>$product->id])}}"
          >
          @csrf
          <button class="btn btn-success" type="submit">Add to Cart</button>
      </form>
      @endif
    </div>
 
   
  </div>