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
        $animal = ucfirst($uris[0]);
        if (isset($uris[1])) {
            $number = $uris[1];
        }
        $dispatcher = new Dispatcher();
        if (count($uris) > 2) {
            $dispatcher::code404();
        } else {
            $dispatcher::animal($animal, $number);
        }
    }
}
