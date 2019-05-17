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
    	$url = 'http://46.101.65.213/????';
    	$token = 'gAAAAABc3s-ihdLma5d_Zw_h4d4ZKHHM7otd07kToZ6Fl2ORo4s6MdvoEKvZbN6yU8TnlXbkPJybmfMCdUEcoe3h5rVD-05VFEPzBczGYou5UErOUI6hOzU4bedQoAO-ljz6SjWQQ6GVUruYM4VnUmBKofvI-L0g2C7uVtshlw83wt1DAwYkbjo';

    	
    	$response = $client->request('GET', $url, [
    		'headers' => [
    			'x-auth-token' => $token,
    		]
		]);


		return $response;
    }
}
