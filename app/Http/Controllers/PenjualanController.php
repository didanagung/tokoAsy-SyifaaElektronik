<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Exports\PenjualanExport;
use Maatwebsite\Excel\Facades\Excel;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'judul' => 'Daftar Penjualan',
            'penjualan' => collect(Penjualan::getLastestPenjualan())->sortBy([['tanggal', 'desc']])
        ];


        return view('admin.penjualan', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
        $data = [
            'judul' => "Tambah Data Penjualan Hari Ini",
            'penjualan' => Barang::find($id)
        ];
        // dd($data['penjualan']);
        return view('admin.tambahPenjualan', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Penjualan::create([
            'barang_id' => $request->barang_id,
            'tanggal' => $request->tanggal,
            'terjual' => $request->terjual
        ]);
        return redirect('/penjualan')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penjualan::find($id)->delete();
        return redirect('/penjualan')->with('info', 'Data berhasil di hapus!');
    }

    function export()
    {
        return Excel::download(new PenjualanExport, 'penjualan.xlsx');
    }
}
