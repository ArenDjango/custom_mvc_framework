<?php

define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendore/framework');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app');
define('LAYOUT', 'default ');

if(!function_exists('env')){
    function env($name){
        return json_decode(file_get_contents(dirname(__DIR__) . '/env.json'))->$name;
    }
}
