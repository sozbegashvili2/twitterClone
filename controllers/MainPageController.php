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
        $vkey = $router->database->addUser($data);
}
    public function login(Router $router,Request $request) {
         $data = $request->getBody();
        $check = $router->database->checkUser($data);
    if(!$check) {
        header("location:/");
    }
    else
    {
            return $router->renderContent('login',['msg' => $check]);
    }
    }
    public function verification(Router $router,Request $request) {
        return $router->renderContent('verify');
    }
}