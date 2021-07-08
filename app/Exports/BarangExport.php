<?php

namespace App\Exports;

use App\Models\Barang as ModelsBarang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BarangExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return[
            'Nama Barang',
            'Harga',
            'Jumlah'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Barang::all();
        
        return collect(ModelsBarang::getBarang())->sortBy([['nama_barang', 'asc']]);
    }
}
