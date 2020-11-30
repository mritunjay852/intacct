<?php
/* Front Controller */
session_start();
error_reporting(E_ALL);

spl_autoload_register(function($className){
    if( file_exists('../Core/'. $className .'.php') ){
        require_once '../Core/'. $className .'.php';
    }elseif( file_exists('../Controllers/'. $className .'.php') ){
        require_once '../Controllers/'. $className .'.php';
    }elseif( file_exists('../Models/'. $className .'.php') ){
        require_once '../Models/'. $className .'.php';
    }
    
});

Router::connect('/', 'HomeController@index','GET');
Router::connect('/report/fetch', 'ReportController@fetchReport','GET');
Router::connect('/report/fetchreport', 'ReportController@fetchReportByDate','POST');
Router::connect('/user/register', 'UserController@register','GET');
Router::connect('/user/add', 'UserController@add','POST');
Router::connect('/user/edit', 'UserController@edit','GET');
Router::connect('/user/editpost', 'UserController@editPost','POST');
Router::connect('/product/add', 'ProductController@productAdd','GET');
Router::connect('/product/addpost', 'ProductController@productPost','POST');
Router::connect('/product/edit', 'ProductController@edit','GET');
Router::connect('/product/editpost', 'ProductController@editPost','POST');
Router::connect('/product/purchase', 'ProductController@purchase','GET');
Router::connect('/product/buynow', 'ProductController@buyNow','POST');