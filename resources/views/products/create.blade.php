@extends('layouts.app')

@section('content')
    <h2 class="page-title">Add Product</h2>
    <p class="helper-text">Fill in the details below to add a new item to your store.</p>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="alert-error">
            <ul class="error-list">
                @foreach($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div class="form-grid">
            <div class="field field-full">
                <label for="name">Product Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Ex: Wireless Mouse" required>
            </div>

            <div class="field">
                <label for="category">Category</label>
                <input id="category" type="text" name="category" value="{{ old('category') }}" placeholder="Ex: Accessories" required>
            </div>

            <div class="field">
                <label for="price">Price</label>
                <input id="price" type="number" name="price" value="{{ old('price') }}" step="0.01" min="0" placeholder="0.00" required>
            </div>

            <div class="field field-full">
                <label for="quantity">Quantity</label>
                <input id="quantity" type="number" name="quantity" value="{{ old('quantity') }}" min="0" placeholder="0" required>
            </div>
        </div>

        <div class="actions">
            <button class="btn" type="submit">Save Product</button>
        </div>
    </form>
@endsection