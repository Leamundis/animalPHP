<?php
namespace Controller;
use Helper\View as View;
use Model\Cat as Cat;


class Dispatcher
{
    static function animal($animal, $number)
    {
        $img = "";
        $animalNamespace = "\\Model\\" . $animal;
        $newAnimal = new $animalNamespace;
        for ($i=0; $i < (int)$number; $i++) { 
            $animalRender = $newAnimal->get();
            if ($animal == "Cat") {
                $img .= '<img src="' . $animalRender->file . '">';
            } elseif ($animal == "Dog") {
                $img .= '<img src="' . $animalRender->url . '">';
            } elseif ($animal == "Fox") {
                $img .= '<img src="' . $animalRender->image . '">';                
            }
        }

        $view = new View;
        $view->renderView(__FUNCTION__, [
            '{{TITLE}}' => $animal,
            '{{ANIMAL}}' => $img
        ]);
    }

    static function code404()
    {
        var_dump("Error, you're too silly, learn how to count to 2!"); die;
    }
}