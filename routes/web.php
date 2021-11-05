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

// Cards
$router->get('cards', 'CardsController@showAll');

$router->post('cards/add', 'CardsController@add');

$router->post('cards/{card_id}/edit', 'CardsController@edit');

$router->post('cards/{card_id}/like', 'CardsController@like');

$router->delete('cards/{card_id}/delete', 'CardsController@delete');

// Comments
$router->post('cards/{card_id}/comment/add', 'CommentsController@add');

$router->post('cards/comment/{comment_id}/like', 'CommentsController@like');

$router->post('cards/comment/{comment_id}/dislike', 'CommentsController@dislike');

$router->delete('cards/comment/{comment_id}/delete', 'CommentsController@delete');
