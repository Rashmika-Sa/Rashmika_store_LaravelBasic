@extends('layouts.app')

@section('content')
    <h2 class="page-title">Product List</h2>
    <p class="helper-text">Overview of products currently in your inventory.</p>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    @if($products->isEmpty())
        <p class="empty-state">No products found yet. <a class="inline-link" href="{{ route('products.create') }}">Add your first product</a>.</p>
    @else
        <div class="table-wrap">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->quantity }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection