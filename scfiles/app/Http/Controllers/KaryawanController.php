<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Models\Jabatan;
use App\Models\Gol;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    public function select(){
        // fungsi select untuk memanggil jumlah karyawan ke dashboard
        $karyawans = DB::table('karyawans')->count('nama_karyawan');
        return $karyawans;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $karyawan = Karyawan::all();
        return view('karyawan.index')->with('karyawan',$karyawan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $karyawan = Karyawan::all();
        //Controller lainny bisa diambil apabila dihubungkan dengan relasi
        $jabatan = Jabatan::all();
        $gol = Gol::all();
        return view('karyawan.create')->with('karyawan',$karyawan)->with('jabatan',$jabatan)->with('gol',$gol);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'nama_karyawan' => 'required',
            'jabatan_id' => 'required',
            'gol_id' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'alamat_lengkap' => 'required',
            'nomor_telepon' => 'required',
            
        ]);
        
        // validasi data
        $karyawan = new Karyawan();
        $karyawan->nama_karyawan = $validateData['nama_karyawan'];
        $karyawan->jabatan_id = $validateData['jabatan_id'];
        $karyawan->gol_id = $validateData['gol_id'];
        $karyawan->tanggal_lahir = $validateData['tanggal_lahir'];
        $karyawan->tempat_lahir = $validateData['tempat_lahir'];
        $karyawan->alamat_lengkap = $validateData['alamat_lengkap'];
        $karyawan->nomor_telepon = $validateData['nomor_telepon'];
        
        //save
        $karyawan->save();// simpan ke table karyawans
        return redirect()->route('karyawan.index')->with("infocreate", "Karyawan $karyawan->nama_karyawan telah ditambahkan !"); // redirect ke karyawan index
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        //
        return view('karyawan.show')->with('karyawan',$karyawan);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        //
        $jabatan = Jabatan::all();
        $gol = Gol::all();
        return view('karyawan.edit')->with('karyawan',$karyawan)->with('jabatan',$jabatan)->with('gol',$gol);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        //
        $validateData = $request->validate([
            'nama_karyawan' => 'required',
            'jabatan_id' => 'required',
            'gol_id' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'alamat_lengkap' => 'required',
            'nomor_telepon' => 'required',
            
        ]);
        Karyawan::where('id', $karyawan->id)->update($validateData);
        $request->session()->flash("infocreate", "Karyawan $karyawan->nama_karyawan telah diubah !");// simpan kembali ke table karyawans
        return redirect()->route('karyawan.index'); // redirect ke karyawan index

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        //
        $karyawan->delete();
        return redirect()->route('karyawan.index')->with("infodelete", "Karyawan : $karyawan->nama_lengkap berhasil dihapus");
    }
}
