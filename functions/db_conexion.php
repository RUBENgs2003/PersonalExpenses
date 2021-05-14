<?php

$conn = new mysqli('localhost', 'root', 'YOUR PASSWORD', 'personalexpenses'); // 1-SERVER 2-USER 3-PASS 4-NAME

if($conn->connect_error){
    echo $error -> $conn->$connect_error;
}

?>
