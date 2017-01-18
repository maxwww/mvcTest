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

function debug($value)
{
    echo '<pre>';
    print_r($value);
    var_dump($value);
    echo '</pre>';
}