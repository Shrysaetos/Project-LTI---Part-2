<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as IlluRequest;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class InstanceController extends Controller
{

    public function getInstances(){
    	$client = new \GuzzleHttp\Client();
    	$url = 'http://46.101.65.213/compute/v2.1/servers/detail';
    	$token = 'gAAAAABc2vAzxvkaUxnqydhbFClSLFEfdBX_sYwUynoX--LRhc_wSekY4Yf7rLUtjLS13emsGyf1zegZBQZq68iL0VM2g4LUboA1j83PMJipVjTDq_GHH784ZuOkQR6-80gmaCAV6hI9CFGDw1ePj16IQkun4FrAvqsZwnggeYxbIbCJllXFyTo';

    	
    	$response = $client->request('GET', $url, [
    		'headers' => [
    			'x-auth-token' => $token,
    		]
		]);


		return $response;
    }

}
