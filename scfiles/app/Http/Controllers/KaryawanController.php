<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Models\Jabatan;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    public function select(){
        // fungsi select untuk memanggil jumlah karyawan ke dashboard
        $karyawans = DB::table('karyawans')->count('nama_lengkap');
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
        $karyawans = Karyawan::all();
        return view('karyawan.index')->with('karyawans',$karyawans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $karyawans = Karyawan::all();
        //Controller lainny bisa diambil apabila dihubungkan dengan relasi
        $jabatans = Jabatan::all();
        return view('karyawan.create')->with('karyawans',$karyawans)->with('jabatans',$jabatans);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //// request
        $validateData = $request->validate([
            'foto' => 'required|file|image|max:5000',
            'nama_lengkap' => 'required',
            'jabatan_id' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'alamat_lengkap' => 'required',
            'nomor_telepon' => 'required',
            
        ]);
        // Ekstensi File Gambar
        $ext = $request->foto->getClientOriginalExtension();
        // Rename Nama File
        $rename_file = 'foto-'.time().".".$ext;
        $request->foto->storeAs('public', $rename_file);
        // validasi data
        $karyawan = new Karyawan();
        $karyawan->foto = $rename_file;
        $karyawan->nama_lengkap = $validateData['nama_lengkap'];
        $karyawan->jabatan_id = $validateData['jabatan_id'];
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
     * @param  \App\Models\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(karyawan $karyawan)
    {
        //
        return view('karyawan.show')->with('karyawan',$karyawan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(karyawan $karyawan)
    {
        //
        $karyawan = Karyawan::all();
        $jabatans = Jabatan::all();
        return view('karyawan.edit')->with('karyawan',$karyawan)->with('jabatans',$jabatans);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, karyawan $karyawan)
    {
        //
        //// request
        $validateData = $request->validate([
            'foto' => 'required|file|image|max:5000',
            'nama_lengkap' => 'required',
            'jabatan_id' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'alamat_lengkap' => 'required',
            'nomor_telepon' => 'required',
            
        ]);
        // Ekstensi File Gambar
        $ext = $request->foto->getClientOriginalExtension();
        // Rename Nama File
        $rename_file = 'foto-'.time().".".$ext;
        $request->foto->storeAs('public', $rename_file);
        // validasi data
        $karyawan = new Karyawan();
        $karyawan->foto = $rename_file;
        $karyawan->nama_lengkap = $validateData['nama_lengkap'];
        $karyawan->jabatan_id = $validateData['jabatan_id'];
        $karyawan->tanggal_lahir = $validateData['tanggal_lahir'];
        $karyawan->tempat_lahir = $validateData['tempat_lahir'];
        $karyawan->alamat_lengkap = $validateData['alamat_lengkap'];
        $karyawan->nomor_telepon = $validateData['nomor_telepon'];
        
        $array = (array) $prodi;
        //save
        Karyawan::where('id', $karyawan->id)->update($array);
        $request->session()->flash("infocreate", "Karyawan $karyawan->nama_karyawan telah diubah !");// simpan kembali ke table karyawans
        return redirect()->route('karyawan.index'); // redirect ke karyawan index
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(karyawan $karyawan)
    {
        //
        $karyawan->delete();
        return redirect()->route('karyawan.index')->with("infodelete", "Karyawan : $karyawan->nama_lengkap berhasil dihapus");

    }
}
