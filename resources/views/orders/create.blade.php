@extends('layouts.app')
@section('content')
    

    <h1>Order Detail</h1>
        <form 
            class="d-inline"
            method="POST"
            action="{{route('orders.store')}}"
        >
        @csrf
        <button class="btn btn-success" type="submit">Place Order</button>
            <div class=" table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                       
                    <th>
                       
                        Product</th>
                   
                    <th>Prices</th>
                    <th>Qunatity</th>
                    <th>Total</th>
                  
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart->products as $product)
                        
                  
                    <tr>
                        
                        <td>
                            <img src="{{asset($product->images->first()->path)}}" alt="{{$product->title}}" width="100">
                            {{$product->title}}</td>
                       
                        <td>£{{$product->price}}</td>
                        <td>{{$product->pivot->quantity}}</td>
                        <td>£{{$product->total}}</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h4 class="text-center"><strong> Total Amount: </strong>£{{$cart->total}}</h4>
        </div>
  
@endsection