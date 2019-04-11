<?php
require("constants.php");

$dbh = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_NAME, DB_USER, DB_PASS);
// 1. Create a database connection using constants which are included as required.
//$connection = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
//if (!$dbh) {
//	die("Database connection failed: " . mysql_error());
//}
// 2. Select a database to use 
//$db_select = mysql_select_db(DB_NAME,$connection);
//if (!$db_select) {
//	die("Database selection failed: " . mysql_error());
//}
?>