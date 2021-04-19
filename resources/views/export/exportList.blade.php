<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak | Application ToDoList</title>
    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <style>
        @media print {
        .tombol-export {
            display: none;
        }
    }
    </style>

</head>

<body>

    <div class="container">
    <hr>
    <table border=1 class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Judul List </th>
                <th>Kategori </th>
                <th>Waktu</th>
                <th>Status List</th>
                <th>Tanggal List</th>
                <th>Deskripsi</th>
                <th>Tanggal List Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $dt)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$dt->judul}}</td>
                <td>{{$dt->kategori->nama_kategori}}</td>
                <td>{{$dt->waktu}}</td>
                <td>{{$dt->status_list}}</td>
                <td>{{$dt->tanggal_list}}</td>
                <td>{{$dt->deskripsi}}</td>
                <td>{{$dt->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

        <button onclick="window.print()" class="tombol-export btn btn-success">Print</button>

    </div>

</body>

</html>
