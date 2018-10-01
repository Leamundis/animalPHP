<?php

namespace Helper;


class View
{
    private $viewDirectory = "./view/";

    public function renderView($viewName, Array $values)
    {
        $content = $this->loadView($viewName);
        $template = $this->loadView('base', 'template');
        $navBar = $this->loadView('menu', 'template');
        $renderHTML = str_replace('{{CONTENT}}', $content, $template);
        $renderHTML = str_replace('{{MENU}}', $navBar, $renderHTML);
        foreach ($values as $key => $value) {
            $renderHTML = str_replace($key, $value, $renderHTML);
        }
        echo $renderHTML;
    }

    private function loadView($viewName, $type = 'view')
    {
        if ($type === 'view') {
            $viewPath = $this->viewDirectory . $viewName . ".html";
        } elseif ($type === 'template') {
            $viewPath = $this->viewDirectory . 'layout/' . $viewName . ".html";
        }
        if (file_exists($viewPath)) {
            return file_get_contents($viewPath);
        }
    }
}


