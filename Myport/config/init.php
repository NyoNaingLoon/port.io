<?php


function my_autoloader($class) {
    $class_path = 'lib/' . $class . '.php';
    if (file_exists($class_path)) {
        require_once($class_path);
        
    }
}

spl_autoload_register('my_autoloader');
