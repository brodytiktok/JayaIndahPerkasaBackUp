<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Models\Order;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $status = Status::all();
        return view('status.index')->with('status',$status);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $status = Status::all();
        return view('status.create')->with('status',$status);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //request
        $validateData = $request->validate([
            'status' => 'required'
        ]);
        // validasi data
        $status = new Status();
        $status->status = $validateData['status'];
        
        //save
        $status->save();
        return redirect()->route('status.index')->with("infocreate", "Status $status->status telah ditambahkan !"); // redirect ke status index

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        //
        return view('status.edit')->with('status',$status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        //
        //request
        $validateData = $request->validate([
            'status' => 'required'
        ]);
        //save
        Status::where('id', $status->id)->update($validateData);
        $request->session()->flash('infocreate', "Status : $status->status berhasil diubah");
        return redirect()->route('status.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        //
        $status->delete();
        return redirect()->route('status.index')->with("infodelete", "Status : $status->status berhasil dihapus");
    }
}
