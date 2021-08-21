<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        $trans = Transaksi::all();
        
        $total = 0;
        foreach($trans as $item){
            $total = $total + $item->total;
        }

        return view('superadmin.index', compact('barang', 'trans', 'total'));
    }
}
