<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    // use HasFactory;
    protected $table = 'pejualan';
    protected $guarded = ['id'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}