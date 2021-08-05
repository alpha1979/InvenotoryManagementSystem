@extends('layouts.app')
@section('content')
    

    <h1>Payment Detail</h1>
    <h4 class="text-center mb-3"><strong> Total Amount: </strong>£{{$order->total}}</h4>
    <div class="text-center">
        <form 
            class="d-inline"
            method="POST"
            action="{{route('orders.payments.store',['order'=>$order->id])}}"
        >
        @csrf
        <button class="btn btn-success" type="submit">Pay Now</button>
    </div>
  
@endsection