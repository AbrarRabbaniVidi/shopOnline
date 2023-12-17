<!DOCTYPE html>
<html>

<head>
    <title>Laporan Penjualan</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Penjualan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Penjualan</h4>

    </center>

    <table class="table table-bordered table-hovered" id="table">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Invoice</th>
                <th>Nama Produk</th>

                <th>Harga </th>

                <th>QTY</th>
                <th>Total</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td align="center">{{ $loop->iteration }}</td>
                    <td>{{ $product->invoice }}</td>
                    <td>{{ $product->nama_produk }}</td>

                    <td>{{ $product->harga }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>{{ $product->harga * $product->qty }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
