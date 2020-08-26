<?php

$conn = new mysqli('localhost', 'root', 'Listoguapo1#', 'personalexpenses'); // 1-SERVER 2-USER 3-PASS 4-NAME

if($conn->connect_error){
    echo $error -> $conn->$connect_error;
}

?>