<?php 
//session Start
session_start();


//creat constants 

define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'manage_student');

$con= mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD,DB_NAME); //database conection



?>