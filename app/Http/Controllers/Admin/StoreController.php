<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /* Show store dashboard for admin user */
    public function dashboard()
    {
        $data = (object)[];
        return view('admin.store.dashboard', [ 'data' => $data ]);
    }

    /* Show purchase orders for admin user */
    public function getOrders()
    {
        $data = (object)[];
        $data->records = [];
        return view('admin.store.orders.index', [ 'data' => $data ]);
    }
}
