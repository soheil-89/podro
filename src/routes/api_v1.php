<?php
Dusterio\LumenPassport\LumenPassport::routes(app(), ['prefix' => '/oauth']);

$router->group(['middleware' => 'auth:api'], function () use ($router) {
    $router->get("products", 'ProductController@index');
    $router->get("product/{id}", 'ProductController@show');
    $router->group(['middleware' => 'adminCheck'], function () use ($router) {
        $router->post("product", 'ProductController@store');
        $router->delete("products", 'ProductController@delete');
        $router->put("product/{id}", 'ProductController@update');


        $router->post("image", 'ImageController@store');
        $router->delete("image/{id}", 'ImageController@delete');

        $router->get("users", 'UserController@index');
        $router->put("user", 'UserController@confirm');
    });

});

$router->post("user/register", 'UserController@register');
$router->get("market", ['as' => 'market_view',"uses"=>'MarketController@view']);

