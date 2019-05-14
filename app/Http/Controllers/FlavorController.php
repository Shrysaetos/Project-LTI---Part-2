<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as IlluRequest;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class FlavorController extends Controller
{
    public function getFlavors(){
    	$client = new \GuzzleHttp\Client();
    	$url = 'http://46.101.65.213/compute/v2.1/flavors';
    	$token = 'gAAAAABc2uenc_nH74-soyciqiA0kE27adLoNBPUO76n8AYzwGX5ZQvTywk-X3lnxGjiRAg9AoQn9UXYMmyLOQ5WnE6aqoQQOUb3RCiLfdqQzofNbvx7B9Nw74Rb5F2aIdBA4U5TescRKWbyZaL5DO3lUa2IMjuxg_nZsFRQk-RsDzaGPKoZWEs';

    	
    	$response = $client->request('GET', $url, [
    		'headers' => [
    			'x-auth-token' => $token,
    		]
		]);


		return $response;
    }
}
