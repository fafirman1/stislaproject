<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tfoot {
            font-weight: bold;
        }

        .total {
            text-align: right;
            padding-right: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Moko Wardah Parfum</h1>
        <p>Jl. Jenderal Sudirman, Kalirejo. Kec. Kalirejo Lampung Tengah</p>
        <p>Telepon: 0821 9826 9826</p>
    </div>

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
                <td colspan="3" class="total">Total Penjualan:</td>
                <td>Rp. {{ number_format($total_penjualan, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
