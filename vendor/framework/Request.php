<?php

namespace vendor\framework;

class Request{
    public function segments($index){
        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);
        return $uri_segments[$index];
    }

    public static function path(){
        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        return $uri_path;
    }
}