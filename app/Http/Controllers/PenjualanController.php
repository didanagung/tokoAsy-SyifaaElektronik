<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\PenjualanExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;

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
        // dd($request);
        Penjualan::create([
            'barang_id' => $request->barang_id,
            'tanggal' => $request->tanggal,
            'terjual' => $request->terjual
        ]);
        return redirect('/penjualan')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        Penjualan::find($id)->delete();
        return redirect('/penjualan')->with('info', 'Data berhasil di hapus!');
    }

    // public function cari(request $request)
    // {
    //     // dd($request);
    //     $cari = $request->cari;

    //     $penjualan = DB::table('penjualan')
    //     ->join('barang', 'barang.id', '=', 'penjualan.barang_id')
	// 	->where('tanggal','like',"%".$cari."%")
	// 	->paginate(5);

    //     $data = [
    //         'judul' => 'Daftar Barang',
    //         'penjualan' => $penjualan
    //     ];

    //     return view('admin.penjualan', ['data' => $data]);
    // }

    function export()
    {
        return Excel::download(new PenjualanExport, 'penjualan.xlsx');
    }

}
