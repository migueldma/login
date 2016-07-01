<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

//$db_server = 'localhost';
//$db_user = 'root';
//$db_passwd = 'invino';
//$dbname = 'apuestas_db';

$db_server = 'localhost';
$db_user = 'apuestas_admin';
$db_passwd = 'feAp802*';
$dbname = 'apuestas_db';

$conn = new PDO("mysql:host=$db_server;dbname=$dbname;", $db_user, $db_passwd);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);