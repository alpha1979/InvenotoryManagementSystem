@extends('layouts.master')
@section('content')
    
    <h1>{{$product->title}} ({{ $product->id}})</h1>
    <p>{{$product->description}}</p>
    <p>{{$product->price}}</p>
</body>
</html>
@endsection