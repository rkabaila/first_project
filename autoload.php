<?php
/**
 * Created by PhpStorm.
 * User: Rimas
 * Date: 2/1/2016
 * Time: 3:08 PM
 */
/*function autoload($className){
    echo dirname(__FILE__);
    $file = dirname(__FILE__) . '\\' . $className .'.php';
    if (file_exists($file)){
    require $file;
    }
}

spl_autoload_register('autoload');
*/
spl_autoload_register(function ($class_name) {
    require_once $class_name . '.php';
});