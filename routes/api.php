<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'LoginControllerAPI@login'); 
Route::middleware('auth:api')->post('logout', 'LoginControllerAPI@logout');

//Volumes
	//Create
Route::post('createVolume', 'VolumeController@createVolume');
Route::post('createVolume/{name}/{description}/{size}/{image}', 'VolumeController@createVolume');

	//List
Route::get('/volumes', 'VolumeController@listVolumes');
Route::get('/listImages', 'VolumeController@listImages');

Route::post('createVolume', 'VolumeController@createVolume');

//Key Pairs
Route::get('keypairs', 'KeypairController@getKeypairs');

//Images
Route::get('images', 'ImageController@getImages');

//Instances
Route::get('instances', 'InstanceController@getInstances');
	//create
Route::get('zones', 'InstanceController@getZones');
Route::post('createInstance/{name}/{description}/{zone}/{image}/{volumeName}/{size}/{flavor}/{networkId}/{networkName}/{keypair}', 'InstanceController@createInstance');

//Flavors
Route::get('flavors', 'FlavorController@getFlavors');

//Networks
Route::get('networks', 'NetworkController@getNetworks');

//Security Groups
Route::get('security-groups', 'SecurityGroupController@getSecurityGroups');