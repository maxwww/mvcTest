<?php

namespace maxw\web;

use maxw\exceptions\NoSuchFile;

/**
 * Class Controller
 * @package maxw\web
 */
class Controller
{
    public function render($view, $params = [])
    {
        $content = $this->renderView($view, $params);
        return $this->renderContent($content);
    }

    private function renderView($view, $params)
    {
        $class = get_class($this);
        $class = str_replace('Controller', '', $class);
        $class = explode('\\', $class);
        $class = array_pop($class);
        $class = strtolower($class);
        $viewFile = __DIR__ . '/../../../views/' . $class . '/' . $view . '.php';

        if (file_exists($viewFile)) {
            ob_start();
            ob_implicit_flush(false);
            extract($params, EXTR_OVERWRITE);
            require($viewFile);

            return ob_get_clean();
        } else {
            throw new NoSuchFile("Such View is not found!");
        }
    }

    private function renderContent($content)
    {
        $layoutFile = $this->getLayoutFile();

        if (file_exists($layoutFile)) {
            ob_start();
            ob_implicit_flush(false);
            require($layoutFile);

            return ob_get_clean();
        } else {
            echo $layoutFile;
            throw new NoSuchFile("Such Layout is not found!");
        }
    }

    private function getLayoutFile()
    {
        if (isset($this->layout)) {
            return __DIR__ . '/../../../views/layouts/' . $this->layout . '.php';
        } else {
            return __DIR__ . '/../../../views/layouts/main.php';
        }
    }
}