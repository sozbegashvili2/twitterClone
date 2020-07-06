<?php
class MainPageController
{
    public function renderMain(Router $router,Request $request) {
        return $router->renderView('index');
    }
    public function renderLogin(Router $router,Request $request) {
        return $router->renderContent('login');
    }
    public function renderRegister(Router $router,Request $request) {
        return $router->renderContent('sign_up');
    }
    public function signup(Router $router,Request $request) {
         $data = $request->getBody();
         $router->database->addUser($data);
    }
}