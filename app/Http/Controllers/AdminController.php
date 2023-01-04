<?php

namespace App\Http\Controllers;

use App\Models\DataObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use PDF;

class AdminController extends Controller
{
    public function index()
    {
      $data_obat = DB::table('obat')->paginate(10);
      return view('admin.admin', ['data_obat' => $data_obat]);
    }

    public function create(Request $request)
    {
        DataObat::create($request->all());
        return redirect('/admin')->with('Sukses', 'Data berhasil DiSimpan');
    }

    public function edit(Request $request, $id)
    {
        $data_obat = \App\Models\DataObat::find($id);
        return view('/admin', ['admin' => $data_obat]);
    }
    public function update(Request $request, $id)
    {
        $data_obat = \App\Models\DataObat::find($id);
        $data_obat->update($request->all());
        return redirect('/admin')->with('Sukses', 'Data berhasil DIUpdate');
    }

    public function delete($id)
  {
    $data_obat = \App\Models\DataObat::find($id);
    $data_obat->delete();
    return redirect('admin')->with('Sukses', 'Data berhasil dihapus');
  }

  public function exportPdf()
  {
    $data_obat = \App\Models\DataObat::all();
    $pdf = PDF::loadView('export.apotekpdf', ['apotek' => $data_obat]);
    return $pdf->download('apotek.pdf');
  }

  public function cari(Request $request)
     {
       $cari = $request->cari;
   
       $data_obat = DB::table('obat')
         ->where('Nama_Obat', 'like', "%" . $cari . "%")
         ->paginate();
   
       return View('admin.admin', ['data_obat' => $data_obat]);
     }
}
