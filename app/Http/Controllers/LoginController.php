<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        $http = new \GuzzleHttp\Client;
        $response = $client->post('http://127.0.0.1:8080/identity/v3/auth/tokens', [
    			'headers' => ['Content-Type' => 'application/json'],
    			'body' => json_encode([
        			array (
  						'auth' => 
  						array (
    						'identity' => 
   	 						array (
      							'methods' => 
      							array (
        							0 => 'password',
      								),
      								'password' => 
      								array (
        								'user' => 
        								array (
          									'name' => 'demo',
          									'domain' => 
          									array (
          									  	'name' => 'Default',
          										),
          									'password' => 'devstack',
        									),
      									),
    							),
  							),
						)
    			])
		])

        return $response;
    }

    public function logout()
    {
        \Auth::guard('api')->user()->token()->revoke(); \Auth::guard('api')->user()->token()->delete();
        return response()->json(['msg'=>'Token revoked'], 200);
    }
}