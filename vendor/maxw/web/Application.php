<?php

namespace maxw\web;
/**
 * Class Application
 */
class Application
{
    public function run($config)
    {
        $route = isset($_GET['r']) ? $_GET['r'] : null;


        if ($route !== null) {
            $route = explode('/', $route);
            $classController = ucfirst($route[0]) . 'Controller';
        } else {
            $classController = ucfirst($config['defaultroute']) . 'Controller';
        }


        if (file_exists(__DIR__ . '/../../../controllers/' . $classController . '.php')) {
            require(__DIR__ . '/../../../controllers/' . $classController . '.php');
            $controller = new $classController();


            $action = isset($route[1]) && $route[1] != "" ? $route[1] : 'index';
            $action = 'action' . ucfirst($action);

            if (method_exists($controller, $action)) {
                $controller->$action();
            } else {
                header("HTTP/1.1 404 Not Found");
                header("Status: 404 Not Found");
                echo "Ошибка 404";
            }


        } else {
            header("HTTP/1.1 404 Not Found");
            header("Status: 404 Not Found");
            echo "Ошибка 404";
        }


    }
}


function debug($value)
{
    echo '<pre>';
    print_r($value);
    var_dump($value);
    echo '</pre>';
}