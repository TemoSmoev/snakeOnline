<?php
spl_autoload_register(function($className) {
    $array_paths=array(
        '/components/',
        '/models/'
    );
    foreach ($array_paths as $path){
        $path=ROOT.$path.$className.'.php';
        if(is_file($path)){
            include_once $path;
        }
    }
});