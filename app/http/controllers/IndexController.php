<?php

namespace app\http\controllers;

use vendor\framework\Controller\Controller;
use vendor\framework\Database\DB;

class IndexController extends Controller
{
    public function index()
    {
        DB::instance();
        $users = DB::table('users', 'disting')
//            ->whereNull('user_id')
            ->leftJoin('products', 'users.id', '=', 'products.user_id')
            ->get();
        $products = DB::table('products')->get();
        $query = DB::$queries[0];

        return $this->render('site/index', compact('users', 'query', 'products'));
    }
    public function product($id)
    {
        return $this->render('site/product', compact('id'));
    }
    public function about()
    {
        echo 'About';
        return 'About';
    }
}