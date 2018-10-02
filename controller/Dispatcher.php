<?php
namespace Controller;
use Helper\View as View;
use Model\Cat as Cat;


class Dispatcher
{
    static function animal($animal, $number)
    {
        for ($i=0; $i < $number; $i++) { 
            $newAnimal = new Cat;
            $newAnimal->getOne();
            var_dump($newAnimal); die;
        }


        $view = new View;
        $view->renderView(__FUNCTION__, [
            '{{TITLE}}' => "My Home",
        ]);
    }

    static function code404()
    {
        var_dump("Error, you're too silly!"); die;
    }
}