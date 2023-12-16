<!-- resources/views/products/index.blade.php -->

@extends('home') <!-- Adjust the layout as needed -->

@section('content')
<div class="container">
    <h1 class="page-header">
        Product Categories
    </h1>

    <div class="col-md-4">
        <form action="{{ route('add.category') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="form-group">
                <input type="submit" name="add_category" class="btn btn-primary" value="Add Category">
            </div>
        </form>
    </div>

    <div class="col-md-8">
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Title</th>
                </tr>
            </thead>

            <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->price }}</td>
                    <!-- Add more columns as needed -->
                    <td>
                        <!-- Add your button here -->
                        <form action="{{ route('delete.category', $category->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection