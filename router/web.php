<?php

use vendor\framework\Router\Router;

//Router::group(
//    [
//        'name'=>'admin.',
//        'prefix'=>'admin',
//    ],
//    [
//        Router::add(['route'=>'/dashboard', 'name'=>'dashboard', 'method'=>'get', 'controller'=>'IndexController', 'function'=>'admin'])
//    ]);

//Router::add(['route'=>'/', 'name'=>'main', 'method'=>'get', 'controller'=>'IndexController', 'function'=>'index']);
Router::add(['route'=>'/home', 'name'=>'home', 'method'=>'get', 'controller'=>'IndexController', 'function'=>'index']);
Router::add(['route'=>'/product/{id}', 'name'=>'product', 'method'=>'get', 'controller'=>'IndexController', 'function'=>'product']);
Router::add(['route'=>'/about', 'name'=>'about', 'method'=>'get', 'controller'=>'IndexController', 'function'=>'about']);
