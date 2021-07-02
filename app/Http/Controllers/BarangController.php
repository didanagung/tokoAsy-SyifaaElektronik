<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'judul' => 'Daftar Barang',
            'barang' => Barang::paginate(5)
        ];
        // Alert::success('Success Title', 'Success Message');

        return view('admin.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'judul' => 'Tambah Data Barang'
        ];
        return view('admin.tambah', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|unique:Barang,nama_barang',
            'harga' => 'required',
            'jumlah' => 'required',
            'gambar' => 'required|mimes:png,jpeg,jpg'
        ]);

        // memberi nama supaya file tidak sama
        $imgName = $request->gambar->getClientOriginalName() . '-' . time() . '.' . $request->gambar->extension();

        // memindahkan file ke dirctory public
        $request->gambar->move(public_path('img'), $imgName);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'slug' => Str::slug($request->nama_barang, '-'),
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'gambar' => $imgName
        ]);
        return redirect('/barang')->with('success', 'Data Berhasil Ditambahkan');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'judul' => 'Edit data barang',
            'barang' => Barang::find($id)
        ]; 
        return view('admin.edit', ['data' => $data]);
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
        $oldData = Barang::find($id);
        // dd($request);
        // memberi nama supaya file tidak sama
        if ($request->gambar != ''){
            $request->validate([
                'nama_barang' => 'required',
                'harga' => 'required',
                'jumlah' => 'required',
                'gambar' => 'required|mimes:png,jpeg,jpg'
            ]);

            $imgName = $request->gambar->getClientOriginalName() . '-' . time() . '.' . $request->gambar->extension();

            // memindahkan file ke dirctory public
            $request->gambar->move(public_path('img'), $imgName);

        } elseif ($request->nama_barang != $oldData->nama_barang) {
            $request->validate([
                'nama_barang' => 'required|unique:Barang,nama_barang',
                'harga' => 'required',
                'jumlah' => 'required',
            ]);
            if ($request->gambar != ''){
                $imgName = $request->gambar->getClientOriginalName() . '-' . time() . '.' . $request->gambar->extension();

            // memindahkan file ke dirctory public
            $request->gambar->move(public_path('img'), $imgName);
            }else {
                $imgName = $oldData->gambar;
            }
        } else {
            $request->validate([
                'nama_barang' => 'required',
                'harga' => 'required',
                'jumlah' => 'required',
            ]);
            $imgName = $oldData->gambar;
        }


        Barang::where('id', $id)->update([
            'nama_barang' => $request->nama_barang,
            'slug' => Str::slug($request->nama_barang, '-'),
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'gambar' => $imgName
        ]);
        return redirect('/barang')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Barang::find($id);
        $hps = $del->gambar;
        $gmbrHps = public_path('img/' . $hps);
        // dd($gmbrHps);
        $tdkHpsDefault = public_path('img/default.png');
        if (file_exists($gmbrHps)) {
            if ($gmbrHps != $tdkHpsDefault) {
                unlink($gmbrHps);
            }
        }
        $del->delete();

        return redirect('/barang')->with('info', 'Data berhasil di hapus!');
    }

    public function cari(request $request)
    {
        // dd($request->cari);
        $cari = $request->cari;

        $barang = DB::table('barang')
		->where('nama_barang','like',"%".$cari."%")
		->paginate(5);

        $data = [
            'judul' => 'Daftar Barang',
            'barang' => $barang
        ];

        return view('admin.index', ['data' => $data]);
    }

}
