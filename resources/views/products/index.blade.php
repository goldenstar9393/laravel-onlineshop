<!-- resources/views/products/index.blade.php -->

@extends('home') <!-- Adjust the layout as needed -->

@section('content')

<div class="row">
    <h1 class="page-header">All Products</h1>

    <table class="table table-hover"  id="products-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>
                    <a href="{{ route('products', ['sort' => 'name', 'direction' => ($sortField == 'name' && $sortDirection == 'asc') ? 'desc' : 'asc']) }}">
                        Name
                        @if ($sortField == 'name')
                            @if ($sortDirection == 'asc')
                                &uarr;
                            @else
                                &darr;
                            @endif
                        @endif
                    </a>
                </th>
                <th>Category</th>
                <th>
                    <a href="{{ route('products', ['sort' => 'price', 'direction' => ($sortField == 'price' && $sortDirection == 'asc') ? 'desc' : 'asc']) }}">
                        Price
                        @if ($sortField == 'price')
                            @if ($sortDirection == 'asc')
                                &uarr;
                            @else
                                &darr;
                            @endif
                        @endif
                    </a>
                </th>
                <!-- Add more headers as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->price }}</td>
                    <!-- Add more columns as needed -->
                    <td>
                        <!-- Add your button here -->
                        <form action="{{ url('edit_product/'.$product->id) }}" method="get">
                            <button type="submit" class="btn btn-success">Edit</button>
                        </form>
                    </td>
                    <td>
                        <!-- Add your button here -->
                        <form action="{{ route('delete.product', $product->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            {{ $products->links() }}
        </tbody>
    </table>
</div>

@endsection
