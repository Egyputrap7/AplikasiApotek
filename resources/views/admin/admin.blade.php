<!DOCTYPE html>
<html>

<head>

    <title>PRAKTIKUM LARAVEL CRUD</title>
    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">

    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home">Apotek</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/pelayan">Pelayan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/admin">Admin</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <a class="dropdown-item" href="/home">
                                {{ __('Home') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <form class="d-flex" action="{{ route('admin.admin') }}" method="GET">
                        <input class="form-control me-2" type="text" name="cari" placeholder="Cari Nama Obat"
                            value="{{ old('cari') }}">
                        <button class="btn btn-light" type="submit">Cari</button>
                    </form>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        {{-- Alert Succes --}}
        @if (session('Sukses'))
            <div class="alert alert-success" role="alert">
                {{ session('Sukses') }}
            </div>
        @endif
        {{-- alert ketika gagal menemukan --}}
        @if ($data_obat->count() > 0)
        @else
            <div class="alert alert-dark" role="alert">
                Data Tidak Di temukan
            </div>
        @endif
        <div class="row">
            <div class="col-9 mt-3">
                <h1>Data Apotek</h1>
            </div>

            <div class="col-2 mt-4">
                <a href="/admin/exportpdf" class="btn btn-md btn-outline-success">Export PDF</a>
            </div>
            <div class="col-1 my-4">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-md float-right" data-toggle="modal"
                    data-target="#exampleModal">
                    Tambah Data
                </button>
            </div>

            <div class="table-responsive">
                <table id="edittable" class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Obat</th>
                            <th scope="col">Stock Obat</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Expired</th>
                            <th scope="col">Suplier</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    @foreach ($data_obat as $obat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $obat->Nama_Obat }}</td>
                            <td>{{ $obat->Stock_Obat }}</td>
                            <td>{{ $obat->Harga_Obat }}</td>
                            <td>{{ $obat->expired }}</td>
                            <td>{{ $obat->supplier }}</td>
                            <td>
                                <a data-toggle="modal" class="btn btn-warning bgn-sm"
                                    data-target="#updatemodal" data-id="{{ $obat->id }}">Edit</a>
                                <a href="/admin/delete/{{ $obat->id }}" class="btn btn-danger bgn-sm"
                                    onclick="return confirm('Yakin Mau Dihapus?')">Delete</a>

                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>

            </div>
            Current Page: {{ $data_obat->currentPage() }}<br>
            Jumlah Data: {{ $data_obat->total() }}<br>
            Data perhalaman: {{ $data_obat->perPage() }}<br>
            <br>
            {{ $data_obat->links() }}
        </div>
    </div>


    <!-- Modal Create -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add.data') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Nama</label>
                            <input name="Nama_Obat" type="text" class="form-control mt-2" id="namaObat"
                                aria-describedby="EmailHelp">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Stock Obat</label>
                            <input name="Stock_Obat" type="number" class="form-control mt-2" id="stockObat"
                                aria-describedby="EmailHelp">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Harga Obat</label>
                            <input name="Harga_Obat" type="numeric" class="form-control mt-2" id="hargaObat"
                                aria-describedby="EmailHelp">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1">Expired</label>
                            <input name="expired" type="date" class="form-control mt-2" id="tglExpired">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">supplier</label>
                            <input name="supplier" type="text" class="form-control mt-2" id="namaSupplier"
                                aria-describedby="EmailHelp">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
{{-- Modal Updatte --}}
    <div class="modal fade" id="updatemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('update.data', ['id' => $obat->id]) }}" id="editform">
                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Nama</label>
                            <input name="Nama_Obat" type="text" class="form-control mt-2" id="namaObat"
                                aria-describedby="EmailHelp" value="{{$obat->Nama_Obat}}" >
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Stock Obat</label>
                            <input name="Stock_Obat" type="number" class="form-control mt-2" id="stockObat"
                                aria-describedby="EmailHelp" value="{{$obat->Stock_Obat}}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Harga Obat</label>
                            <input name="Harga_Obat" type="numeric" class="form-control mt-2" id="hargaObat"
                                aria-describedby="EmailHelp" value="{{$obat->Harga_Obat}}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1">Expired</label>
                            <input name="expired" type="date" class="form-control mt-2" id="tglExpired"
                            value="{{$obat->expired}}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">supplier</label>
                            <input name="supplier" type="text" class="form-control mt-2" id="namaSupplier"
                                aria-describedby="EmailHelp" value="{{$obat->supplier}}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

</body>



</html>
