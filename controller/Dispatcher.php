<?php
namespace Controller;
use Helper\View as View;


class Dispatcher
{
    static function home()
    {
        $view = new View;
        $view->renderView(__FUNCTION__, [
            '{{TITLE}}' => "My Home",
        ]);
    }

    static function contact()
    {
        $view = new View;
        $view->renderView(__FUNCTION__);
    }

    static function code404()
    {
        var_dump("Error, you're too silly!"); die;
    }
}