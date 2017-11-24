<?php
$conn=mysqli_connect('localhost','root','chatdb');
if(!conn){
    die('connection failed'.mysqli_connect_error);
}