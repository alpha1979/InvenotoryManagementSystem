@extends('layouts.master')
@section('content')
<h1>Edit a product</h1>
<form method="POST" action="{{ route('products.update',['product'=>$product->id]) }}" >
    @csrf
    @method("PUT")
    <div class="form-row">
        <label for="title">Title</label>
        <input type="text" name="title" value="{{old('title') ?? $product->title}}" class="form-control" required/>
    </div>
    <div class="form-row">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" name="description" cols="30" rows="3" required>{{old('description') ?? $product->description}}</textarea>
    </div>
    <div class="form-row">
        <label for="price">Price</label>
        <input type="number" value="{{old('price') ?? $product->price}}" name="price"min="1.0" step="0.01" class="form-control" required/>
    </div>
    <div class="form-row">
        <label for="stock">Stock</label>
        <input type="number" min="0" value="{{old('stock')??$product->stock}}" name="stock" class="form-control" required/>
    </div>
    <div class="form-row">
        <label for="status">Status</label>
        <select name="status" class="custom-select" required>
          
            <option value="available" {{old('status') == 'available' ? 'selected' : ($product->status== 'available' ? 'selected' :'')}} >Available</option>
            <option value="unavailable" {{old('status') == 'unavailable' ? 'selected' : ($product->status== 'unavailable' ? 'selected' :'')}} >Unavailable</option>
        </select>
    </div>
   <div class="form-row">
    <button type="submit" class="btn btn-primary btn-lg">Update Product</button>
   </div>
</form>
@endsection