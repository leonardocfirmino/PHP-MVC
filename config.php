<?php
date_default_timezone_set('America/Sao_Paulo');

global $currentDate;
$currentDate = date("Y-m-d H:i:s", time());

global $db;
define("URL_BASE","http://localhost/func_sale");
$database["name"] = "func_sale";
$database["host"] = "localhost";
$database["user"] = "root";
$database["pass"] = "";
$db = new PDO("mysql:dbname=".$database['name'].";host=".$database['host'], $database['user'], $database['pass']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
   