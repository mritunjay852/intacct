<?php
abstract class Model
{
    public static function getDatabaseConnection(){
        static $conn = null;
        if($conn === null){
            $conn = new mysqli('localhost','root','','intacct');
            if( $conn->connect_error ){
                throw new Exception('Unable to connect DB'. $conn->connect_error);
            }
        }
        return $conn;
    }
}