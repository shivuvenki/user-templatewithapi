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

$router->group(['prefix'=>'api'], function() use ($router){

    $router->post('login-with-userid-password',['uses'=>'LoginController@login_with_userid_password']);

    $router->post('create-template-web',['uses'=>'LoginController@create_template_web']);

    $router->get('get-all-template',['uses'=>'LoginController@get_all_template']);

    $router->post('send-email-template-web',['uses'=>'LoginController@send_email_template_web']);
    $router->post('get-template-em-web',['uses'=>'LoginController@get_template_em_web']);
    
});
