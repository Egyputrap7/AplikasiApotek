<!DOCTYPE html>
<html>

<head>
    <title>Data Obat Apotek</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-
ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Data Obat Apotek</h5>
        <h1>Data Obat</h1>
    </center>
    <table class='table table-bordered'>
        <thead>
            <tr>
               
                <th>Nama Obat</th>
                <th>Stock Obat</th>
                <th>Harga</th>
                <th>Expired</th>
                <th>Suplier</th>
            </tr>
        </thead>
        @php $i=1 @endphp
        @foreach ($apotek as $obat)
            <tr>               
                <td>{{ $obat->Nama_Obat }}</td>
                <td>{{ $obat->Stock_Obat }}</td>
                <td>{{ $obat->Harga_Obat }}</td>
                <td>{{ $obat->expired }}</td>
                <td>{{ $obat->supplier }}</td>
            </tr>
            @endforeach
            </tbody>
    </table>
</body>

</html>
