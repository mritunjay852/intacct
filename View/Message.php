<?php
echo "<br>";
if( !empty( $_SESSION['success'] ) ){
    echo $_SESSION['success'];
    $_SESSION['success']="";
}
if( !empty( $_SESSION['error'] ) ){
    echo $_SESSION['error'];
    $_SESSION['error']="";
}