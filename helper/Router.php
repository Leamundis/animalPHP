<?php
namespace Helper;
use Controller\Dispatcher as Dispatcher;

class Router
{
    private function trimUri($uri)
    {
        $simpleUri = substr($uri, 1);
        $uris = explode('/', $simpleUri);
        return $uris;
    }


    public function route()
    {
        $uris = $this->trimUri($_SERVER['REQUEST_URI']);
        $animal = $uris[0];
        if (isset($uris[1])) {
            $number = $uris[1];
        }
        var_dump($uris); die;
        $dispatcher = new Dispatcher();
        if (method_exists($dispatcher, $uri)) {
            $dispatcher::$uri();
        } else {
            $dispatcher::code404();
        }
    }
}
