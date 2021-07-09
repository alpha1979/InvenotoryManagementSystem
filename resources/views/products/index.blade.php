@extends('layouts.master')
@section('content')
    

    <h1>This is main product page</h1>
    <div>
        <a href="{{route('products.create')}}">Create</a>
    </div>
    @if (empty($products))
        <div class="alert alert-warning">
            The product page is empty
        </div>
  
        @else
            <div class=" table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>
                        Id
                    </th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Prices</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        
                  
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->stock}}</td>
                        <td>{{$product->status}}</td>
                        <td> <a href="{{route('products.show',['product'=>$product->id])}}">Show</a> |
                            <a href="{{route('products.edit',['product'=>$product->id])}}">Edit</a> 
                            <form method="POST" action="{{route('products.destroy',['product'=>$product->id])}}">
                                @csrf 
                                @method('DELETE')
                                <button type="submit"> Delete </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
   @endif
@endsection