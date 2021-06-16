<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Penjualan extends Model
{
    // use HasFactory;
    protected $table = 'penjualan';
    protected $guarded = ['id'];

    public static function getPenjualan() {
        $records = DB::table('penjualan')
        ->join('barang', 'barang.id', '=', 'penjualan.barang_id')
        ->select('barang.nama_barang', 'penjualan.tanggal', 'penjualan.terjual')
        ->get()->toArray();
        return $records;
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public static function getLastestPenjualan()
    {
        $penjualan = DB::table('penjualan')
        ->join('barang', 'barang.id', '=', 'penjualan.barang_id')
        ->select('penjualan.id', 'barang.nama_barang', 'penjualan.tanggal', 'penjualan.terjual')
        ->get()->toArray();

        // $collection = collect($penjualan);
        return $penjualan;
    }

}
