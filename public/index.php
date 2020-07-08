<?php
session_start();
require_once '../Router.php';
require_once  '../Request.php';
require_once '../controllers/MainPageController.php';
require_once '../db/Database.php';
$router = new Router(new Request(),new Database());
$router->get('/',[MainPageController::class,'renderMain']);
$router->get('/login',[MainPageController::class,'renderLogin']);
$router->post('/login',[MainPageController::class,'login']);
$router->get('/signup',[MainPageController::class,'renderRegister']);
$router->post('/signup',[MainPageController::class,'signup']);
$router->get('/verify',[MainPageController::class,'verification']);
$router->get('/verification',[MainPageController::class,'verify']);
$router->get('/reset_password',[MainPageController::class,'recoverPass']);
$router->post('/reset_password',[MainPageController::class,'postRecover']);
$router->get('/reset_form',[MainPageController::class,'renderReset']);
$router->post('/reset_form',[MainPageController::class,'resetPass']);
session_destroy();
