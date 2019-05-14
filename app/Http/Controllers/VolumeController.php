<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as IlluRequest;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class VolumeController extends Controller
{
   /*public function createVolume(){
    	$client = new \GuzzleHttp\Client();
    	$url = '127.0.0.1:8080/volume/v3/6fa6b37e2d1a4e49a0704bb7ee2d9f73/volumes';
    	$token= 'gAAAAABc2s43TaJ7VF4DY_bygspyZimaDMPvseMhd3N6P1JppdoAsaAPz19ft1GqF_zMyCxu2wwGKLDjTQLgdkuMRJwa7EBOwutP4WgSjpOWCs_u9HbnDlp2sCQBoJ9t1_6sbcBWTSbH9CBnaLWbJygiBvhlKp-hw5i2WEWlbFfkHbFrSkjbBYA';
    	$body = '{ "volume": { "size": 3, "availability_zone": null, "source_volid": null, "description": "testePost", "multiattach": false, "snapshot_id": null, "backup_id": null, "name": "testePost3", "imageRef": "12fe23eb-1bc8-441a-a810-5c17f9bf90b6", "volume_type": null, "metadata": {}, "consistencygroup_id": null } }';

    	$response = $client->request('POST', 'http://httpbin.org/post', [
    		'body' => $body,
            'x-auth-token' => $token,
       
        ]);
	return $response;*/


  
   public function createVolume(){
    	$client = new \GuzzleHttp\Client();
    	$url = '127.0.0.1:8080/identity/v3/auth/tokens';
    	$body = '{ "auth": { "identity": { "methods": [ "password" ], "password": { "user": { "name": "demo", "domain": { "name": "Default" }, "password": "devstack" } } }, "scope": { "project": { "id": "6fa6b37e2d1a4e49a0704bb7ee2d9f73" } } } }';

    	$response = $client->request('POST', $url, [
    		'body' => $body
		]);

		//$token = $response->getHeader('X-Subject-Token')[0];
		//$token = $response->getResponseHeader('X-Subject-Token');

		return $response;
    }

    public function getVolumes(){
    	$client = new \GuzzleHttp\Client();
    	$url = ' 127.0.0.1:8080/volume/v3/b144a42f7435431f90fdf172e7fa0579/volumes';
    	$token = 'gAAAAABczHR5V4Wscw9oxmcxPpocLAEk88saOxw9MBYAejFlQBGrB-eKmN3a0b_0sx2Suf3rE53lztyM7uijnrTirnzMa2iI0rRgfRW2_sei3pvfbYuS1U8NRA3ANw48dhkIKdvjhcGj0654O-5awNRZL_PFxY3jrBjLI_iQqdzuQ6TaHOszI4U';
    	
    	$response = $client->request('GET', $url, [
    		'headers' => [
    			'x-auth-token' => $token,
    		]
		]);


		return $response;
    }


}




?>