<?php
class Controller
{
    public function render($path){
        header('Location: '.$path);
    }
}