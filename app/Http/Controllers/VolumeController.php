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
    	$body = '{ "auth": { "identity": { "methods": [ "password" ], "password": { "user": { "name": "demo", "domain": { "name": "Default" }, "password": "devstack" } } }, "scope": { "project": { "id": "6fa6b37e2d1a4e49a0704bb7ee2d9f73" } } } }';

    	$response = $client->request('POST', $url, [
    		'body' => $body
		]);

		//$token = $response->getHeader('X-Subject-Token')[0];
		//$token = $response->getResponseHeader('X-Subject-Token');

		return $response;
    }


    public function listVolumes(){
    	$client = new \GuzzleHttp\Client();
    	$url = 'http://46.101.65.213/volume/v3/58293217310f47b69785e31aaaad5987/volumes/detail';
    	$token = 'gAAAAABc2vAzxvkaUxnqydhbFClSLFEfdBX_sYwUynoX--LRhc_wSekY4Yf7rLUtjLS13emsGyf1zegZBQZq68iL0VM2g4LUboA1j83PMJipVjTDq_GHH784ZuOkQR6-80gmaCAV6hI9CFGDw1ePj16IQkun4FrAvqsZwnggeYxbIbCJllXFyTo';

    	
    	$response = $client->request('GET', $url, [
    		'headers' => [
    			'x-auth-token' => $token,
    		]
		]);


		return $response;
    }


}




?>