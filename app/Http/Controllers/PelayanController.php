<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PDF;

class PelayanController extends Controller
{
    public function index()
    {
      $data_obat = DB::table('obat')->paginate(10);
      return view('pelayan.pelayan', ['data_obat' => $data_obat]);
    }
    public function edit(Request $request,$id)
   {
     $data_obat = \App\Models\DataObat::find($id);
     return view('/pelayan.modal',['pelayan' => $data_obat]);
   }
   public function update(Request $request, $id)
    {
      $data_obat = \App\Models\DataObat::find($id);
      $data_obat->update($request->only('Stock_Obat'));
      return redirect('/pelayan')->with('Sukses','Data berhasil DIUpdate');
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
   
       return view('pelayan.pelayan', ['data_obat' => $data_obat]);
     }
}
