@extends('layouts.layout')

@section('title', 'Товары')

@section('content')
    <div class="container mt-5">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-center mb-5">Продукция</h1>
        <div class="text-center">
            <a href="{{ route('products.create') }}" class="btn btn-success m-3">Добавить товар</a>
        </div>
        @foreach ($products as $product)
            <div class="product-card row align-items-center border border-dark rounded p-3 mb-4">
                <div class="col-md-9">
                    <h4><strong>{{ optional($product->productType)->name }} | {{ $product->name }}</strong></h4>
                    <p>Артикул: {{ $product->article }}</p>
                    <p>Минимальная стоимость для партнера: {{ number_format($product->minPrice, 2, '.', '') }}</p>
                    <p>Ширина (м): {{ $product->width }}</p>
                </div>
                <div class="col-md-3 text-end">
                    <h4>Стоимость (₽):</h4>
                    <p><strong>{{ number_format($cost[$product->id], 2, '.', '') }}</strong></p>
                </div>
                <div class="text-center">
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm me-2">Просмотр</a>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm me-2">Редактировать</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
