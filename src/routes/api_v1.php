<?php
Dusterio\LumenPassport\LumenPassport::routes(app(), ['prefix' => '/oauth']);
$router->post("image", 'ImageController@store');
$router->delete("image/{id}", 'ImageController@delete');
