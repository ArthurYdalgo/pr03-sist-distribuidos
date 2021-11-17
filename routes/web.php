<?php

/** @var \Laravel\Lumen\Routing\Router $router */


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group([
    'prefix' => 'api',
], function () use ($router) {
    
    $router->post('login', 'AuthController@login');
    $router->post('register', 'AuthController@register');


    $router->group([
        'middleware' => 'auth:api',
    ], function () use ($router) {
        $router->post('logout', 'AuthController@logout');
        $router->get('refresh', 'AuthController@refresh');
        $router->post('refresh', 'AuthController@refresh');        

        $router->group([
            'prefix' => 'listing',
        ], function () use ($router) {
            $router->post('', 'ListingController@store');
            $router->put('{listing_id}', 'ListingController@update');  
            $router->delete('{listing_id}', 'ListingController@destroy');  

            $router->get('', 'ListingController@list');
            $router->get('{listing_id}', 'ListingController@get');
        }); 

        $router->group([
            'prefix' => 'listing-item',
        ], function () use ($router) {
            $router->post('{listing_id}', 'ListingItemController@store');
            $router->put('{listing_item_id}', 'ListingItemController@update');  
            $router->post('check/{listing_item_id}', 'ListingItemController@check');  
            $router->post('uncheck/{listing_item_id}', 'ListingItemController@uncheck');  
            $router->delete('{listing_item_id}', 'ListingItemController@destroy');  

            $router->get('', 'ListingItemController@list');
            $router->get('{listing_item_id}', 'ListingItemController@get');
        }); 

    });


});
