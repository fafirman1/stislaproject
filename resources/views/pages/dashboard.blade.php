@extends('layouts.app')

@section('title', 'Dashboard Admin')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <tr>
                    <td><h1>Dashboard</h1></td>
                </tr>
            </div>
            {{-- <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card card-statistic-2">
                        <div class="card-stats">
                            <div class="card-stats-title">Statistik
                                <form method="GET" action="{{ route('penjualan.index') }}" class="form-inline">
                                    <div class="form-group mr-2">
                                        <label for="month" class="mr-2">Pilih Bulan </label>
                                        <select name="month" id="month" class="form-control selectric">
                                            @foreach (range(1, 12) as $month)
                                                <option value="{{ $month }}" {{ request('month') == $month ? 'selected' : '' }}>
                                                    {{ DateTime::createFromFormat('!m', $month)->format('F') }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mr-2">
                                        <label for="year" class="mr-2">Pilih Tahun </label>
                                        <select name="year" id="year" class="form-control selectric">
                                            @foreach (range(2020, date('Y')) as $year)  <!-- Adjust the start year as needed -->
                                                <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                                                    {{ $year }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>
                                        <div class="card-icon shadow-primary bg-primary">
                                            <i class="fas fa-archive"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4>Total Transaksi</h4>
                                            </div>
                                            <div class="card-body">
                                                59
                                            </div>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="card-icon shadow-primary bg-primary">
                                            <i class="fas fa-dollar-sign"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4>Total Penjualan</h4>
                                            </div>
                                            <div class="card-body">
                                                $187,13
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Nota Penjualan</h4>
                            <div class="card-header-action">
                                <a href="#"
                                    class="btn btn-danger">Lihat <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive table-invoice">
                                <table class="table-striped table">
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Nomor Nota</th>
                                        <th>Produk</th>
                                        <th>Kasir</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <td><a href="#">INV-87239</a></td>
                                        <td class="font-weight-600">Kusnadi</td>
                                        <td>
                                            <div class="badge badge-warning">Unpaid</div>
                                        </td>
                                        <td>July 19, 2018</td>
                                        <td>
                                            <a href="#"
                                                class="btn btn-primary">Detail</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">INV-48574</a></td>
                                        <td class="font-weight-600">Hasan Basri</td>
                                        <td>
                                            <div class="badge badge-success">Paid</div>
                                        </td>
                                        <td>July 21, 2018</td>
                                        <td>
                                            <a href="#"
                                                class="btn btn-primary">Detail</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">INV-76824</a></td>
                                        <td class="font-weight-600">Muhamad Nuruzzaki</td>
                                        <td>
                                            <div class="badge badge-warning">Unpaid</div>
                                        </td>
                                        <td>July 22, 2018</td>
                                        <td>
                                            <a href="#"
                                                class="btn btn-primary">Detail</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">INV-84990</a></td>
                                        <td class="font-weight-600">Agung Ardiansyah</td>
                                        <td>
                                            <div class="badge badge-warning">Unpaid</div>
                                        </td>
                                        <td>July 22, 2018</td>
                                        <td>
                                            <a href="#"
                                                class="btn btn-primary">Detail</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">INV-87320</a></td>
                                        <td class="font-weight-600">Ardian Rahardiansyah</td>
                                        <td>
                                            <div class="badge badge-success">Paid</div>
                                        </td>
                                        <td>July 28, 2018</td>
                                        <td>
                                            <a href="#"
                                                class="btn btn-primary">Detail</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
