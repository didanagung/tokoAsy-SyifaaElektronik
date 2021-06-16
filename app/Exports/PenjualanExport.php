<?php

namespace App\Exports;

use App\Models\Penjualan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PenjualanExport implements FromCollection,WithHeadings
{

    public function headings():array{
        return[
            'Nama Barang',
            'Tanggal',
            'Terjual'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Penjualan::all();
        return collect(Penjualan::getPenjualan())->sortBy([['tanggal', 'desc']]);
    }
}
