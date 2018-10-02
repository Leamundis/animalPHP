<?php
namespace Helper;
class View
{
    private $viewDirectory = "./view/";

    public function renderView($viewName, Array $values)
    {
        $content = $this->loadView($viewName);
        $template = $this->loadView('base', 'template');
        $renderHTML = str_replace('{{CONTENT}}', $content, $template);
        foreach ($values as $key => $value) {
            //var_dump($key, $value); die;
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


