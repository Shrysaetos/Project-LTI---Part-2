<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as IlluRequest;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class GroupController extends Controller
{
    public function getGroups(){
    	$client = new \GuzzleHttp\Client();
    	$url = 'http://46.101.65.213/volume/v3/58293217310f47b69785e31aaaad5987/volumes/detail';
    	$token = 'gAAAAABc3t9pRUd2Fdr4QI5kV-tU1wHkDFQAjREJfYnhkhhOZgChh4aJxdVuQ8BWwnsZEwTIatUhsqriOVEPMc9zHSgmkk6UpICTvS4TTlCD3s5lruXJBRYV4FiYphALUSdMnZ6WvaKNTaZTEsnBVQlfGy3hihgWpoE8SNgBDeUPaHGeGkQclHg';

    	
    	$response = $client->request('GET', $url, [
    		'headers' => [
    			'x-auth-token' => $token,
    		]
		]);


		return $response;
    }
}