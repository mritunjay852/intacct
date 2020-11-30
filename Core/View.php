<?php
class View
{
    public static function make( $path, $data=[] ){
        require_once '../View/'. $path . '.php';
    }
}