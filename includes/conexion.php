<?php

//Conexion
$server = 'localhost';
$username = 'root';
$password = 'cristopher';
$database = 'blog';
$db = mysqli_connect($server,$username,$password,$database);

mysqli_query($db, "SET NAMES 'utf8'");

//iniciar la sesion
if(!isset($_SESSION)) {
    session_start();
}
?>