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
    	$url = 'http://46.101.65.213/volume/v3/58293217310f47b69785e31aaaad5987/volumes';
    	$token = 'gAAAAABc2uDgZp3S78OYbJ7D0AznjCRiZDmaRsvg1_dYsUclUqVED9G__-8M_Q0NTyIUn5z9uCZc5n2WUyNoVF8WISfhJRn3gHhvD_h3X9ESohII1IF41xoT4jJgJJ5NBAR8WPedZ0nmJ-4kgcSkI1MxAVPSPh-S_HoGSxBUEvUGz0wQWQ4F3V0';
    	
    	$response = $client->request('GET', $url, [
    		'headers' => [
    			'x-auth-token' => $token,
    		]
		]);


		return $response;
    }


}




?>