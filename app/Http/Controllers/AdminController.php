<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'judul' => 'Dashboard',
            'barang' => Barang::paginate(8)
        ];

        return view('admin.dashboard', ['data' => $data]);
    }
}
