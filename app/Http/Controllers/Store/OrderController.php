<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;

class OrderController extends Controller
{

    /**
     * Get credentials
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getCredentials()
    {
        $seed = date('c');
        $secretKey = env('PLACE_TO_PAY_SECRET_KEY');

        if (function_exists('random_bytes')) {
            $nonce = bin2hex(random_bytes(16));
        } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $nonce = bin2hex(openssl_random_pseudo_bytes(16));
        } else {
            $nonce = mt_rand();
        }
        
        $nonceBase64 = base64_encode($nonce);
        $tranKey = base64_encode(sha1($nonce . $seed . $secretKey, true));

        $credentials = array(
            'seed' => $seed,
            'login' => env('PLACE_TO_PAY_LOGIN'),
            'tranKey' => $tranKey,
            'nonce' =>  $nonceBase64
        );

        return $credentials;
    }    

    /**
     * Create request payment gateway
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createRequest(Request $request, Order $order)
    {
        $endpoint = env('PLACE_TO_PAY_API_URL').'/api/session';
        $returnURL = url('orders/response/'.$order->id);

        $credentials = $this->getCredentials();

        $response = Http::post( $endpoint, [
                'auth' => $credentials,
                'payment' => [
                    'reference' => $order->id,
                    'description' => $request->product_name.' '.$request->product_price,
                    'amount' => [
                        'currency' => 'COP',
                        'total' => $request->product_price,
                ],
            ],
            'expiration' => date('c', strtotime('+1 hour')),
            'returnUrl' => $returnURL,
            'ipAddress' => '127.0.0.1',
            'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36'
        ]);

        return $response->json();
    }

    /**
     * Get request information
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getRequestInfo($requestId)
    {
        $endpoint = env('PLACE_TO_PAY_API_URL').'/api/session/'.$requestId;

        $credentials = $this->getCredentials();

        $response = Http::post( $endpoint, [
                'auth' => $credentials
        ]);

        return $response->json();
    }

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
        $response = $this->createRequest($request, $order);
        //dd($response);
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
        $response = $this->getRequestInfo($order->requestId);
        $order->status = $response['status']['status'];
        $order->save();
        switch($order->status){
            case "CREATED":
                $data->estado_compra = "Pendiente";
                break;
            case "PAYED":
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
