<?php
require_once 'IRequest.php';
class Router
{
    private $getRoutes = [];
    private $postRoutes = [];
    public $request = null;
    public $database = null;
    public $layout = 'layout';
    public function __construct(Request $request,Database $database)
    {
        $this->request = $request;
        $this->database = $database;
    }

    public function get($path,$callback) {
        $this->getRoutes[$path] = $callback;
    }
    public function post($path,$callback) {
        $this->postRoutes[$path] = $callback;
    }

    public function __destruct()
    {
        $pathInfo = $this->request->getPath();;
        if ($this->request->getMethod() === 'GET') {
            $check = $this->getRoutes[$pathInfo] ?? false;
        }
        else
        {
            $check = $this->postRoutes[$pathInfo] ?? false;
        }
        if(!$check) {
            $content = '404 - Page not found';
        }
        else
        {

           if (is_string($check)) {
               $this->renderView($check);
           }
           else
           {
              echo $content = call_user_func($check,$this,$this->request);
           }
        }

    }
    public function renderView(string $view, $params = [])
    {
        ob_start();
        $content = $this->getViewContent($view, $params);
        include_once __DIR__."/views/{$this->layout}.php";
        return ob_get_clean();
    }

    public function renderContent(string $content,$params = [])
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once __DIR__."/views/{$content}.php";
        return ob_get_clean();
    }
    public function getViewContent($check,$params = [])
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        require_once "views/$check.php";
        return ob_get_clean();
    }
}