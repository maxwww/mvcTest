<?php
function __autoload($class)
{
    $class = str_replace("\\", "/", $class);
    if (preg_match('/^maxw\//', $class)) {
        require_once(__DIR__ . "/../vendor/$class.php");
    } else {
        $class = explode('/', $class);
        $class = end($class);
        require_once(__DIR__ . "/../models/$class.php");
    }

}

$config = require(__DIR__ . '/../config/main.php');

(new \maxw\web\Application())->run($config);


function debug($value)
{
    echo '<pre>';
    print_r($value);
    var_dump($value);
    echo '</pre>';
}