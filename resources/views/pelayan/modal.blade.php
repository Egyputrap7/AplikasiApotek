<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>{{ config('app.name', 'Laravel') }}</title>
 
     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>
 
     <!-- Fonts -->
     <link rel="dns-prefetch" href="//fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
 
     <!-- Styles -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 
</head>

<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <h1 class="col-md-auto">
                Edit Data Apotek
            </h1>
            <form method="POST" action="/pelayan/{{ $pelayan->id }}/update" id="editform">
                {{ csrf_field() }}
    
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Nama</label>
                    <input name="Nama_Obat" type="text" class="form-control mt-2" id="namaObat"
                        aria-describedby="EmailHelp" disabled="disabled" value="{{ $pelayan->Nama_Obat }}">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Stock Obat</label>
                    <input name="Stock_Obat" type="number" class="form-control mt-2" id="stockObat"
                        aria-describedby="EmailHelp" value="{{ $pelayan->Stock_Obat }}">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">Harga Obat</label>
                    <input name="Harga_Obat" type="numeric" class="form-control mt-2" id="hargaObat"
                        aria-describedby="EmailHelp" disabled="disabled" value="{{ $pelayan->Harga_Obat }}">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleFormControlTextarea1">Expired</label>
                    <input name="expired" type="date" disabled="disabled" class="form-control mt-2" id="tglExpired"
                        value="{{ $pelayan->expired }}">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleInputEmail1">supplier</label>
                    <input name="supplier" type="text" class="form-control mt-2" id="namaSupplier"
                        aria-describedby="EmailHelp"disabled="disabled" value="{{ $pelayan->supplier }}">
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-secondary" href="/pelayan" data-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    </form>
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>

</html>
