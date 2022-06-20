<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    // fungsi select untuk memanggil jumlah barang ke dashboard
    public function select(){ 
        $barangs = DB::table('barangs')->count('nama_barang');
        return $barangs;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barangs = Barang::all();
        return view('barang.index')->with('barangs',$barangs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $barangs = Barang::all();
        return view('barang.create')->with('barangs',$barangs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request
        $validateData = $request->validate([
            'tanggal' => 'required',
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'satuan' => 'required',
            'harga_jual' => 'required',
            'stok_awal' => 'required',
            'stok_akhir' => 'required'
        ]);
        // validasi data

        $barang = new Barang();
        $barang->tanggal = $validateData['tanggal'];
        $barang->kode_barang = $validateData['kode_barang'];
        $barang->nama_barang = $validateData['nama_barang'];
        $barang->satuan = $validateData['satuan'];
        $barang->harga_jual = $validateData['harga_jual'];
        $barang->stok_awal = $validateData['stok_awal'];
        $barang->stok_akhir = $validateData['stok_akhir'];
        //save
        $barang->save();
        return redirect()->route('barang.index')->with("infocreate", "Barang $barang->nama_barang telah ditambahkan !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(barang $barang)
    {
        //
        return view('barang.show')->with('barang',$barang);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(barang $barang)
    {
        //
        
        return view('barang.edit')->with('barang',$barang);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, barang $barang)
    {
        //
        $validateData = $request->validate([
            'tanggal' => 'required',
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'satuan' => 'required',
            'harga_jual' => 'required',
            'stok_awal' => 'required',
            'stok_akhir' => 'required'
        ]);

        Barang::where('id', $barang->id)->update($validateData);
        $request->session()->flash('infocreate', "Data barang $barang->nama_barang berhasil diubah");
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(barang $barang)
    {
        //
        $barang->delete();
        return redirect()->route('barang.index')->with("infodelete", "Barang $barang->nama_barang berhasil dihapus !");
    }
}
