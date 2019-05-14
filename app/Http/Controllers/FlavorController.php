<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as IlluRequest;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class FlavorController extends Controller
{
    public function getFlavors() {

    	
		$client = new \GuzzleHttp\Client();
		$headers = [
			'x-auth-token' => ['gAAAAABczHR5V4Wscw9oxmcxPpocLAEk88saOxw9MBYAejFlQBGrB-eKmN3a0b_0sx2Suf3rE53lztyM7uijnrTirnzMa2iI0rRgfRW2_sei3pvfbYuS1U8NRA3ANw48dhkIKdvjhcGj0654O-5awNRZL_PFxY3jrBjLI_iQqdzuQ6TaHOszI4U']
		];
		$table = $client->request('GET', 'http://127.0.0.1:8080/compute/v2.1/flavors', $headers);

		return $table;
    }

}
