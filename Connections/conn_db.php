<?php
$host="localhost";
$user="sales";
$password="123456";
$database="camping";
$link=mysqli_connect($host,$user,$password,$database);
if($link<>false)
{
    mysqli_query($link,"SET NAMES utf8");
}
?>
