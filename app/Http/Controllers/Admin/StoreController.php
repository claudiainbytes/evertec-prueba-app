<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Config;
use App\Models\Administrator;
use App\Models\Order;
use Auth;
use Route;

class StoreController extends Controller
{
    /* Show store dashboard for admin user */
    public function dashboard()
    {
        $data = (object)[];
        if (Auth::guard('administrator')->check()) {
            $data->user = Auth::guard('administrator')->user();
        }  
        return view('admin.store.dashboard', [ 'data' => $data ]);
    }

    /* Show purchase orders for admin user */
    public function getOrders()
    {
        $data = (object)[];
        $data->records = [];
        if (Auth::guard('administrator')->check()) {
            $data->user = Auth::guard('administrator')->user();
            $data->records = Order::orderBy('created_at','desc')->simplePaginate(5);
            $data->numRecords = Order::count();
        }  
        return view('admin.store.orders.index', [ 'data' => $data ]);
    }
}
