<?php
//db info
$dbHost  = "localhost";
$dbLogin = "root";
$dbPwd   = "";
$dbName  = "coffee-shop";
// connection
mysql_connect($dbHost,$dbLogin,$dbPwd) or die("DB Connection failed" .mysql_error());
mysql_select_db($dbName);


 
?>