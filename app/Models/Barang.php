<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Barang extends Model
{
    // use HasFactory;
    protected $table = 'barang';
    protected $guarded = ['id'];

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }

    public static function getBarang() {
        $records = DB::table('barang')
        ->select('nama_barang', 'harga', 'jumlah')
        ->get()->toArray();
        return $records;
    }

}
