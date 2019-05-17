<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as IlluRequest;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;



class VolumeController extends Controller
{    
   public function createVolume(){
    	$client = new \GuzzleHttp\Client();
    	$url = 'http://46.101.65.213/identity/v3/auth/tokens';
    	$body = '{ "auth": { "identity": { "methods": [ "password" ], "password": { "user": { "name": "D-D", "domain": { "name": "Default" }, "password": "D-D" } } }, "scope": { "project": { "id": "58293217310f47b69785e31aaaad5987" } } } }';

    	$response = $client->request('POST', $url, [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
    		'body' => $body
		]);

		$token = $response->getHeader('X-Subject-Token')[0];

		return $token;
    }


    public function listVolumes(){
    	$client = new \GuzzleHttp\Client();
    	$url = 'http://46.101.65.213/volume/v3/58293217310f47b69785e31aaaad5987/volumes/detail';
    	$token = 'gAAAAABc3nWW0TbAVTekTt49E2IRl5NLZ_mp95O149VLPW4oABMQW2IrIIjFYJeOD8O9aaZAfo0-LxOSGGMU0PQ-qSJfjPB-AOGZ7J-hWGlX5ywW-3qktFGuLVZ777hp2VhOO_8MakAqad80QF0G2qfO-79YNZcvF0qQlbl12LA8Bh3ogcx5lzo';

    	
    	$response = $client->request('GET', $url, [
    		'headers' => [
    			'x-auth-token' => $token,
    		]
		]);


		return $response;
    }


}




?>