<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index(){
        $result = DB::select("SELECT orders.statuse_id, statuses.status, COUNT(*)
        as jumlah_status FROM orders
        JOIN statuses ON orders.statuse_id = statuses.id
        GROUP BY orders.statuse_id, statuses.status");
        return view('dashboard.index')->with('result', $result);
    }
}
