<?php
namespace vendor\framework\Router;

use vendor\framework\Request;
use vendor\framework\Router\RouterMethods;

class Router extends RouterMethods {
    public static $routes = [];
    public static $route;

    public static function add($params){
        self::$routes[] = $params;
    }

    public static function group($params, $routes){
//        self::$routes[] = $params;
    }


    /**
     * Return all routes
     *
     * @var array
     */
    public static function routes(){
        return self::$routes;
    }

    /**
     * Return this route
     *
     * @var array
     */
    public static function route(){
        return self::$route;
    }

    /**
     * Return this route name
     *
     * @var array
     */
    public static function routeName(){
        return self::$route;
    }


    /**
     * Dispatch routes
     *
     * @var array
     */

    public static function dispatch(){
        foreach(self::$routes as $route){
            if(self::matchRoute($route['route'])[0] == true){
                $params = self::matchRoute($route['route'])[1];
                if(strtolower($_SERVER['REQUEST_METHOD']) != strtolower($route['method'])){
                    echo "Http method not allowed";
                    continue;
                }
                self::$route = $route;
                $controller = 'app\http\controllers\\' . $route['controller'];
                $method = $route['function'];
                if(class_exists($controller)){
                    $controller_obj = new $controller();
                    if(method_exists($controller_obj, $method)) {
//                        var_dump($params);
                        $controller_obj->$method($params);
                        break;
                    }else{
                        echo "Method <strong>$controller::$method</strong> not found";
                        continue;
                    }
                }else{
                    echo "Controller <strong>$controller</strong> not found";
                    continue;
                }
            }else{
                http_response_code(404);
            }
        }
    }

}