@extends('layouts.app')

@section('content')
    <div class="home-center">
        <div class="home-card">
            <h2 class="page-title">Welcome to My Store</h2>
            <p class="helper-text">Manage products quickly from one place. Choose an action below to get started.</p>

            <div class="home-actions">
                <a class="btn-secondary" href="{{ route('products.index') }}">Product List</a>
                <a class="btn" href="{{ route('products.create') }}">Add Product</a>
            </div>
        </div>
    </div>
@endsection
