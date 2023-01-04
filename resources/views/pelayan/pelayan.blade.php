<!DOCTYPE html>
<html>

<head>

    <title>PRAKTIKUM LARAVEL CRUD</title>
    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    {{-- <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script> --}}
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
                <form class="d-flex" action="/pelayan/cari" method="GET">
                    <input class="form-control me-2" type="text" name="cari" placeholder="Cari Nama Obat"
                        value="{{ old('cari') }}">
                    <button class="btn btn-light" type="submit">Cari</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
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
            <div class="col-12 my-7">
                <h1>Data Apotek</h1>
            </div>
          
                <div class="col-1 mt-1 my-4">
                    <a href="/pelayan/exportpdf" class="btn btn-md btn-primary">Export PDF</a>
                </div>         
            
            <div class="table-responsive">
                <table id="edittable" class="table table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th>NAMA Obat</th>
                            <th>Stock Obat</th>
                            <th>Harga</th>
                            <th>Expired</th>
                            <th>Suplier</th>
                            <th>Action</th>
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
                                <a href="/pelayan/{{ $obat->id }}/modal"
                                    class="btn btn-warning bgn-sm">Beli</a>

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
