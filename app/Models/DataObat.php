<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataObat extends Model
{
    protected $table ='obat';
    protected $fillable = [
        'Nama_Obat',
        'Stock_Obat',
        'Harga_Obat',
        'expired',
        'supplier'];
}
