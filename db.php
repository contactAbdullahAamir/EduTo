<?php

$conn = new mysqli('localhost', 'root', '', 'eduko');
if(!$conn){
    echo "Connection Denied!", mysqli_connect_error();
}

?>