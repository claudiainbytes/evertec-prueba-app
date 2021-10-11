<?php
namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;

class PlaceToPayService {

    private static $secretKey;
    private static $login;
    private static $urlBaseAPI;

    private static function initialize(){
        self::$secretKey = config('services.place_to_pay.secret_key');
        self::$login = config('services.place_to_pay.login');
        self::$urlBaseAPI = config('services.place_to_pay.url_base_api');
    }

     /**
     * Get credentials
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function getCredentials()
    {
        self::initialize();

        $seed = date('c');
        $secretKey = self::$secretKey;

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
            'login' => self::$login,
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
    public static function createRequest(Request $request, $referenceId)
    {
        self::initialize();

        $endpoint = self::$urlBaseAPI.'/api/session';
        $returnURL = url('orders/response/'.$referenceId);

        $credentials = self::getCredentials();

        $response = Http::post( $endpoint, [
                'auth' => $credentials,
                'payment' => [
                    'reference' => $referenceId,
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
    public static function getRequestInfo($requestId)
    {
        self::initialize();
        
        $endpoint = self::$urlBaseAPI.'/api/session/'.$requestId;

        $credentials = self::getCredentials();

        $response = Http::post( $endpoint, [
                'auth' => $credentials
        ]);

        return $response->json();
    }

}