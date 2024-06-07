{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard Admin')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
    <style>
        .product-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin: 15px;
            text-align: center;
        }
        .product-image {
            max-width: 100%;
            height: auto;
        }
        .product-name {
            font-size: 1.2em;
            margin: 10px 0;
        }
        .product-price {
            color: #28a745;
            font-size: 1.1em;
            margin: 5px 0;
        }
        .product-stock {
            color: #dc3545;
            margin: 5px 0;
        }
        .product-category {
            font-size: 0.9em;
            color: #6c757d;
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
        </section>
        <section class="section">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="product-card">
                            <img src="{{ asset('storage/products/' . $product->image) }}" class="product-image" alt="{{ $product->name }}">
                            <div class="product-name">{{ $product->name }}</div>
                            <div class="product-price">Rp. {{ number_format($product->price, 0, ',', '.') }}</div>
                            <div class="product-stock">Stock: {{ $product->stock }}</div>
                            <div class="product-category">{{ $product->category }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
