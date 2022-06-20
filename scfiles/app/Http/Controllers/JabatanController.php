<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Models\Karyawan;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $jabatan =Jabatan::all();
        
        return view('jabatan.index')->with('jabatans',$jabatan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jabatan = Jabatan::all();
        return view('jabatan.create')->with('jabatans',$jabatan);
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
            'jabatan' => 'required'
        ]);
        // validasi data

        $jabatan = new Jabatan();
        $jabatan->jabatan = $validateData['jabatan'];
        
        //save
        $jabatan->save();
        return redirect()->route('jabatan.index')->with("infocreate", "Jabatan $jabatan->jabatan telah ditambahkan !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function show(jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(jabatan $jabatan)
    {
        //
        return view('jabatan.edit')->with('jabatan',$jabatan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jabatan $jabatan)
    {
        // request
        $validateData = $request->validate([
            'jabatan' => 'required'
        ]);
        // validasi data

        $jabatan = new Jabatan();
        $jabatan->jabatan = $validateData['jabatan'];
        
        //save
        Jabatan::where('id', $habatan->id)->update($validateData);
        $request->session()->flash('infocreate', "Jabatan Karyawan : $jabatan->jabatan berhasil diubah");
        
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jabatan  $jabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(jabatan $jabatan)
    {
        //
        $jabatan->delete();
        return redirect()->route('jabatan.index')->with("infodelete", "Jabatan : $jabatan->jabatan berhasil dihapus");

    }
}
