<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as IlluRequest;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class NetworkController extends Controller
{
    public function getNetworks(){
    	$client = new \GuzzleHttp\Client();
    	$url = 'http://46.101.65.213:9696/v2.0/networks';
    	$token = 'gAAAAABc4CPO7UTFAK9ZgZmwnJL5mfKMJ_i82o2PkFugGjnO_hZyOcQ5c7cR5Abtxqte368XLv0yuNIC1IFb4aM0DMV4Z-7iD5EZogPUtyexa5DrDuzCMU8XPdKtzQpc_-TRUPbqppGgb3IwqyMtDcpkxJHmOpe7A6z_Yaiy9STsfsUiBaCdnRo';

    	
    	$response = $client->request('GET', $url, [
    		'headers' => [
    			'x-auth-token' => $token,
    		]
		]);


		return $response;
    }
}
