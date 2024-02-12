<?php

use \app\Http\Response;
use \app\Controller\Admin;

//ROTA Admin
$obRouter->get('/admin',[
    'middlewares' => [
        'required-admin-login'
    ],
    function() {
        return new Response(200,'Admin (:');
    }
]);

//ROTA LOGIN
$obRouter->get('/admin/login',[
    'middlewares' => [
        'required-admin-logout'
    ],

    function($request) {
        return new Response(200,Admin\Login::getLogin($request));
    }
]);

//ROTA LOGIN(POST)
$obRouter->post('/admin/login',[
    'middlewares' => [
        'required-admin-logout'
    ],
    function($request) {
        return new Response(200,Admin\Login::setLogin($request));
    }
]);

//ROTA LOGOUT
$obRouter->get('/admin/logout',[
    'middlewares' => [
        'required-admin-login'
    ],
    function($request) {
        return new Response(200,Admin\Login::setLogout($request));
    }
]);

