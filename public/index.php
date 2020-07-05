<?php
require_once '../Router.php';
require_once  '../Request.php';
require_once '../controllers/MainPageController.php';
$router = new Router(new Request());
$router->get('/',[MainPageController::class,'renderMain']);
$router->get('/login',[MainPageController::class,'renderLogin']);
$router->get('/signup',[MainPageController::class,'renderRegister']);
$router->post('/signup',[MainPageController::class,'login']);