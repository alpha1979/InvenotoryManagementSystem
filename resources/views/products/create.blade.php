@extends('layouts.app')
@section('content')
    <form method="POST" action="{{ route('products.store') }}" >
        @csrf
        <div class="form-row">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{old('title')}}" required/>
        </div>
        <div class="form-row">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" name="description" cols="30" rows="3" required>{{old('description')}}</textarea>
        </div>
        <div class="form-row">
            <label for="price">Price</label>
            <input type="number" name="price"min="1.0" class="form-control" value="{{old('price')}}" required/>
        </div>
        <div class="form-row">
            <label for="stock">Stock</label>
            <input type="number" min="0" name="stock" class="form-control" value="{{old('stock')}}" required/>
        </div>
        <div class="form-row">
            <label for="status">Status</label>
            <select name="status" class="custom-select" required>
                <option value="" selected>Select</option>
                <option value="available" >Available</option>
                <option value="unavailable" >Unavailable</option>
            </select>
        </div>
       <div class="form-row">
        <button type="submit" class="btn btn-primary btn-lg">Create Product</button>
       </div>
    </form>
@endsection