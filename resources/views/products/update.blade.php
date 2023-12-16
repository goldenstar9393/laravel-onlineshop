<!-- resources/views/products/index.blade.php -->

@extends('home') <!-- Adjust the layout as needed -->

@section('content')

<div class="col-md-12">

    <div class="row">
        <h1 class="page-header">
            Edit Product
        </h1>
    </div>

    <form action="{{ route('update.product', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-8">

            <div class="form-group">
                <label for="name">Product Title</label>
                <input type="text" name="name" class="form-control" value = "{{ $product->name }}">
            </div>

            <div class="form-group">
                <label for="description">Product Description</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control" >{{ $product->description }}</textarea>
            </div>

            <div class="form-group row">
                <div class="col-xs-3">
                    <label for="price">Product Price</label>
                    <input type="number" name="price" class="form-control" size="60"  value = "{{ $product->price }}">
                </div>
            </div>

        </div>

        <aside id="admin_sidebar" class="col-md-4">
            <div class="form-group">
                <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Update">
            </div>

            <div class="form-group">
                <label for="category_id">Product Category</label>
                <select name="category_id" id="{{ $product->category_id }}" class="form-control">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </aside>

    </form>

</div>
@endsection
