<?php
$username="root";
$password="";
$host="localhost";
$database="perpustakaan";
$conn = mysqli_connect($host,$username,$password,$database);

if(!$conn){
    mysqli_error();
}

?>