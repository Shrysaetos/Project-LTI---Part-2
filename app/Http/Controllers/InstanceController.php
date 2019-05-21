<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as IlluRequest;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class InstanceController extends Controller
{

    public function getToken(){
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

    public function getInstances(){
    	$client = new \GuzzleHttp\Client();
    	$url = 'http://46.101.65.213/compute/v2.1/servers/detail';
    	$token = $this->getToken();

    	
    	$response = $client->request('GET', $url, [
    		'headers' => [
    			'x-auth-token' => $token,
    		]
		]);


		return $response;
    }

    public function getZones(){
        $client = new \GuzzleHttp\Client();
        $url = 'http://46.101.65.213/compute/v2/os-availability-zone';
        $token = $this->getToken();

        $response = $client->request('GET', $url, [
            'headers' => [
                'x-auth-token' => $token,
            ]
        ]);

        return $response;
    }

    public function createInstance($name, $description, $zone, $image, $volumeName, $size, $flavor, $networkId, $networkName, $keypair){
        $client = new \GuzzleHttp\Client();
        $url = '46.101.65.213/compute/v2/servers';
        $token = $this->getToken();

        $body = '{ "server" : { "name" : '.$name.', "description" : '.$description.', "key_name" : '.$keypair.', "availability_zone": '.$zone.', "flavorRef" : '.$flavor.', "networks" : [{ "uuid" : '.$networkId.', "tag": '.$networkName.' }], "block_device_mapping_v2": [{ "uuid": '.$image.', "source_type": "image", "destination_type": "volume", "boot_index": 0, "volume_size": '.$size.', "tag": '.$volumeName.' }] } }';
        

        $response = $client->request('POST', $url, [
            'headers' => [
                'x-auth-token' => $this->getToken(),
                'Content-Type' => 'application/json',
            ],
            'body' => $body
        ]);


        return $response;

    }

}
