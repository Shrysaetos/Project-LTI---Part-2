<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as IlluRequest;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class KeypairController extends Controller
{
    public function getKeypairs(){
    	$client = new \GuzzleHttp\Client();
    	$url = 'http://46.101.65.213/compute/v2.1/os-keypairs';
    	$token = 'gAAAAABc3t9pRUd2Fdr4QI5kV-tU1wHkDFQAjREJfYnhkhhOZgChh4aJxdVuQ8BWwnsZEwTIatUhsqriOVEPMc9zHSgmkk6UpICTvS4TTlCD3s5lruXJBRYV4FiYphALUSdMnZ6WvaKNTaZTEsnBVQlfGy3hihgWpoE8SNgBDeUPaHGeGkQclHg';

    	
    	$response = $client->request('GET', $url, [
    		'headers' => [
    			'x-auth-token' => $token,
    		]
		]);


		return $response;
    }
}