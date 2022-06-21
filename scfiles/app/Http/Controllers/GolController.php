<?php

namespace App\Http\Controllers;

use App\Models\Gol;
use Illuminate\Http\Request;

class GolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gol = Gol::all();
        return view('gol.index')->with('gol',$gol);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $gol = Gol::all();
        return view('gol.create')->with('gol',$gol);
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
            'golongan' => 'required',
            'penghasilan' => 'required',
        ]);

        $gol = new Gol();
        $gol->golongan = $validateData['golongan'];
        $gol->penghasilan = $validateData['penghasilan'];
        
        //save
        $gol->save();
        $request->session()->flash('infocreate', "Golongan : $gol->golongan berhasil ditambah");
        return redirect()->route('gol.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gol  $gol
     * @return \Illuminate\Http\Response
     */
    public function show(Gol $gol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gol  $gol
     * @return \Illuminate\Http\Response
     */
    public function edit(Gol $gol)
    {
        //
        
        return view('gol.edit')->with('gol',$gol);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gol  $gol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gol $gol)
    {
        //
        $validateData = $request->validate([
            'golongan' => 'required',
            'penghasilan' => 'required',
        ]);

        Gol::where('id', $gol->id)->update($validateData);
        $request->session()->flash('infocreate', "Data Golongan : $gol->golongan berhasil diubah");
        return redirect()->route('gol.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gol  $gol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gol $gol)
    {
        //
        $gol->delete();
        return redirect()->route('gol.index')->with("infodelete", "Golongan : $gol->golongan berhasil dihapus");
    }
}
