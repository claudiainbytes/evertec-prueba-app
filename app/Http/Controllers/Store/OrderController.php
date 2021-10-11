<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\PlaceToPayService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;

class OrderController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = (object)[];  
        return view('store.create', [ 'data' => $data ]);
    }

    /**
     * Get info about the order
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {
        $data = (object)[];  
        $data->customer_name = $request->customer_name;
        $data->customer_email = $request->customer_email;
        $data->customer_mobile = $request->customer_mobile;
        return response()
            ->view('store.checkout-order', [ 'data' => $data ], 200);
    }

    /**
     * Process the order
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request)
    {
        $request->request->add(['status' => "CREATED"]);
        $order = $this->store($request);
        $response = PlaceToPayService::createRequest($request, $order->id);

        if ($response['status']['status'] == "OK") {
            $order->requestId = $response['requestId'];
            $order->processURL = $response['processUrl'];
            $order->save();
            return redirect()->away($response['processUrl']);
        } else {
            $response->status()->message();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = Order::create($request->all());
        return $order;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function response($orderID)
    {
        $data = (object)[];
        $order = Order::find($orderID);  
        $response = PlaceToPayService::getRequestInfo($order->requestId);
        $order->status = $response['status']['status'];
        $order->save();
        switch($order->status){
            case "PENDING":
                $data->estado_compra = "Pendiente";
                break;
            case "APPROVED":    
                $data->estado_compra = "Pagada";
                break;
            case "REJECTED":
                $data->estado_compra = "Rechazada";
                break;
        }
        $data->order = $order;
        return view('store.response-order', [ 'data' => $data ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
