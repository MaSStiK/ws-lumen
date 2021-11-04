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

$router->get('cards', 'CardsController@showAll');

$router->post('cards/add', 'CardsController@add');

$router->post('cards/{card_id}/edit', 'CardsController@edit');

$router->post('cards/{card_id}/like', 'CardsController@like');

$router->delete('cards/{card_id}/delete', 'CardsController@delete');
