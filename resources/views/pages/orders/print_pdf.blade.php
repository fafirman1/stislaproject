<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penjualan</title>
    <!-- Tambahkan style CSS jika diperlukan -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tfoot {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Data Penjualan</h2>
    <table>
        <thead>
            <tr>
                <th>Tanggal Transaksi</th>
                <th>Total</th>
                <th>Total Item</th>
                <th>Kasir</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total_penjualan = 0;
            @endphp
            @foreach ($orders as $order)
                @php
                    $total_penjualan += $order->total_price;
                @endphp
                <tr>
                    <td>{{ $order->transaction_time }}</td>
                    <td>Rp. {{ number_format($order->total_price, 0, ',', '.') }}</td>
                    <td>{{ $order->total_item }}</td>
                    <td>
                        @isset($order->kasir)
                            {{ $order->kasir->name }}
                        @else
                            Kasir tidak ditemukan
                        @endisset
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" style="text-align: right;">Total Penjualan:</td>
                <td>Rp. {{ number_format($total_penjualan, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
