<?php
namespace vendor\framework\Router;

use vendor\framework\Request;

abstract class RouterMethods{



    /**
     * Check routes to match
     *
     * @var boolean
     */
    public static function matchRoute($route){
        $params = [];
        $route = rtrim(ltrim($route, '/'), '/') ;
        $request_path = rtrim(ltrim(Request::path(), '/'), '/');
        $request_uri_segments = explode('/', $request_path);
        $route_segments = explode('/', $route);

        if(count($request_uri_segments) == count($route_segments)){
            foreach ($route_segments as $index => $segment){
                if($segment[0] == '{' && substr($segment, -1) == '}'){
                    $params[] = $request_uri_segments[$index];
                }else{
                    if(isset($request_uri_segments[$index])) {
                        if ($request_uri_segments[$index] != $segment) {
                            return false;
                        }
                    }
                }
            }
        }else{
            return false;
        }
        return [true, $params];
    }

}