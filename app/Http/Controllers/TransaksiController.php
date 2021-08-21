<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::join('barangs', 'barangs.id', 'transaksis.barang_id')->select('transaksis.id', 'barangs.nama_barang', 'transaksis.jumlah', 'transaksis.total')->get();
        $barang = Barang::all();
        return view('transaksi/index', compact('transaksi', 'barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'barang' => ['required'],
            'jumlah' => ['required']
        ]);

        $barang = Barang::find($request->barang);
        if(intval($barang->stok) >= intval($request->jumlah)){
            $barang->stok = intval($barang->stok) - intval($request->jumlah);

            $users = Transaksi::create([
                'barang_id' => $request->barang,
                'jumlah' => $request->jumlah,
                'total' => $request->jumlah * $barang->harga
            ]);

            $barang->save();
        }
        
        return redirect()->route('transaksi.index');
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
        $trans = Transaksi::find($id);
        $barang = Barang::all();
        return view('transaksi/edit', compact('trans', 'barang'));
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
        $this->validate($request, [
            'barang' => ['required'],
            'jumlah' => ['required']
        ]);

        $barang = Barang::find($request->barang);
        if(intval($barang->stok) >= intval($request->jumlah)){

            $trans = Transaksi::find($id);
            $trans->barang_id = $request->barang;

            $barang->stok = intval($barang->stok) + intval($trans->jumlah) - intval($request->jumlah);

            $trans->jumlah = $request->jumlah;
            $trans->total = $request->jumlah * $barang->harga;
            $trans->save();

            $barang->save();
        }
        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trans = Transaksi::find($id);
        
        $barang = Barang::find($trans->barang->id);
        $barang->stok = $barang->stok + $trans->jumlah;
        $barang->save();

        $trans->delete();
        return redirect()->route('transaksi.index');
    }
}
