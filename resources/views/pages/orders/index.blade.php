@extends('layouts.app')

@section('title', 'Penjualan')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Penjualan</h1>
                {{-- <div class="section-header-button">
                    <a href="{{route('product.create')}}"
                        class="btn btn-primary">Add New</a>
                </div> --}}
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Penjualan</a></div>
                    <div class="breadcrumb-item">Data Transaksi</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Data Transaksi</h2>
                <p class="section-lead">
                    Anda Dapat Melihat Data Transaksi Disini.
                </p>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Transaksi</h4>

                            </div>
                            <div class="card-body">
                                <div class="float-left">
                                    <form method="GET" action="{{ route('order.index') }}" class="form-inline">
                                        <div class="form-group mr-2">
                                            <label for="start_date" class="mr-2">Mulai Tanggal </label>
                                            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request('start_date') }}">
                                        </div>
                                        <div class="form-group mr-2">
                                            <label for="end_date" class="mr-2">Sampai Tanggal </label>
                                            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request('end_date') }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                                    </form>

                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>Tanggal Transaksi</th>
                                            <th>Total</th>
                                            <th>Total Item</th>
                                            <th>Kasir</th>
                                        </tr>
                                        @php
                                            $total_penjualan = 0;
                                        @endphp
                                        @foreach ($orders as $order)
                                        @php
                                            $total_penjualan += $order->total_price;
                                        @endphp
                                        <tr>
                                            <td>
                                                <a href="{{route('order.show', $order->id)}}">
                                                    {{$order->transaction_time}}
                                                </a>
                                            </td>
                                            <td>
                                                Rp. {{ number_format($order->total_price, 0, ',', '.') }}
                                            </td>
                                            <td>
                                                {{$order->total_item}}
                                            </td>
                                            <td>
                                                @isset($order->kasir)
                                                        {{ $order->kasir->name }}
                                                    @else
                                                        Kasir tidak ditemukan
                                                    @endisset
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <br>
                                <h6>Total Penjualan: Rp. {{ number_format($total_penjualan, 0, ',', '.') }}</h6>
                                <br>
                                <a href="{{ route('orders.printPDF', ['start_date' => request('start_date'), 'end_date' => request('end_date')]) }}" class="btn btn-primary">Cetak PDF</a>

                                <div class="float-right">
                                    {{$orders->withQueryString()->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>

@endpush
