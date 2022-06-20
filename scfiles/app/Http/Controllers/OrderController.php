<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Status;

class OrderController extends Controller
{
    /* Show jumlah status graph */
    /* public function getStatusGrf(){
        $orders = DB::table('orders')->sum('items');
        return $orders;
    } */
    /* Show jumlah barang dibeli */
    public function getTotalItems(){
        $orders = DB::table('orders')->sum('items');
        return $orders;
    }
    /* Show jumlah pelanggan Order */
    public function getOrder(){
        $orders = DB::table('orders')->count('id');
        return $orders;
    }
    /* Show jumlah pemasukan */
    public function getIncome(){
        $orders = DB::table('orders')->sum('biaya');
        return $orders;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $orders = Order::all();
        return view('order.index')->with('orders',$orders);
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
        return view('order.create')->with('status',$status);
        
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
            'nama_pelanggan' => 'required',
            'tanggal_pemesanan' => 'required',
            'tanggal_terima' => 'required',
            'items' => 'required',
            'metode' => 'required',
            'statuse_id' => 'required',
            'biaya' => 'required'
            
        ]);
        // validasi data

        $order = new Order();
        $order->nama_pelanggan = $validateData['nama_pelanggan'];
        $order->tanggal_pemesanan = $validateData['tanggal_pemesanan'];
        $order->tanggal_terima = $validateData['tanggal_terima'];
        $order->items = $validateData['items'];
        $order->metode = $validateData['metode'];
        $order->statuse_id = $validateData['statuse_id'];
        $order->biaya = $validateData['biaya'];
        //save
        $order->save();
        return redirect()->route('order.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //
        
        return view('order.show')->with('order',$order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
        /* $order = Order::all(); */
        $status = Status::all();
        /* return view('order.edit')->with('status',$status)->with('order',$order); */
        return view('order.edit')->with('order',$order)->with('status',$status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        //
        $validateData = $request->validate([
            'nama_pelanggan' => 'required',
            'tanggal_pemesanan' => 'required',
            'tanggal_terima' => 'required',
            'items' => 'required',
            'metode' => 'required',
            'statuse_id' => 'required',
            'biaya' => 'required'
        ]);

        Order::where('id', $order->id)->update($validateData);
        $request->session()->flash('infocreate', "Data Pelanggan : $order->nama_pelanggan & Urutan ke- $order->id berhasil diubah");
        return redirect()->route('order.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        //
        $order->delete();
        return redirect()->route('order.index')->with("infodelete", "Order : $order->nama_pelanggan berhasil dihapus");
    }
}
