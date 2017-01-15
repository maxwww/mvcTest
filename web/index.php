<?php
function __autoload($class) {
    $class = str_replace("\\","/",$class);
    require_once "../vendor/$class.php";
}

$config =   require(__DIR__ . '/../config/main.php');

(new \maxw\web\Application()) ->run($config);





function debug($value)
{
    echo '<pre>';
    print_r($value);
    var_dump($value);
    echo '</pre>';
}