<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as IlluRequest;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;



class VolumeController extends Controller
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

   public function createVolume($name, $description, $size, $image){
        $client = new \GuzzleHttp\Client();
        $url = '46.101.65.213/volume/v3/58293217310f47b69785e31aaaad5987/volumes';
        $token = $this->getToken();

        if ($image == 'NO_IMAGE') {
            $body = '{ "volume": { "size":'.$size.', "availability_zone": null, "source_volid": null, "description": '.$description.', "multiattach": false, "snapshot_id": null, "backup_id": null, "name": '.$name.', "imageRef": null, "volume_type": null, "metadata": {}, "consistencygroup_id": null } }';
        }else{

        $body = '{ "volume": { "size":'.$size.', "availability_zone": null, "source_volid": null, "description": '.$description.', "multiattach": false, "snapshot_id": null, "backup_id": null, "name": '.$name.', "imageRef": "'.$image.'", "volume_type": null, "metadata": {}, "consistencygroup_id": null } }';
        }



        $response = $client->request('POST', $url, [
            'headers' => [
                'x-auth-token' => $this->getToken(),
                'Content-Type' => 'application/json',
            ],
            'body' => $body
        ]);


        return $token;

    }


    public function listVolumes(){
    	$client = new \GuzzleHttp\Client();
    	$url = 'http://46.101.65.213/volume/v3/58293217310f47b69785e31aaaad5987/volumes/detail';
    	$token = $this->getToken();

    	
    	$response = $client->request('GET', $url, [
    		'headers' => [
    			'x-auth-token' => $token,
    		]
		]);


		return $response;
    }

    public function listImages(){
        $client = new \GuzzleHttp\Client();
        $url = 'http://46.101.65.213/image/v2/images';
        $token = $this->getToken();

        $response = $client->request('GET', $url, [
            'headers' => [
                'x-auth-token' => $token,
            ]
        ]);

        return $response;
    }




        
    

}




?>