<?php
class Router
{
    public static function connect( $path, $route, $method ){
        $query_string = $_SERVER['REQUEST_URI'];
        
        if( preg_match('/^\/[a-z\/_]*/',$query_string,$output) ){
            if( $output[0] == $path && $method == $_SERVER['REQUEST_METHOD'] ){
                $routeArray = explode('@',$route);
                $controller = $routeArray[0];
                $action = $routeArray[1];
                $controller_obj = new $controller();
                $controller_obj->$action();
            }
        }
    }
}