<?php
session_start();
date_default_timezone_set("Asia/Manila");
$dateNow = date('Y-m-d H:i:s');

include 'staticDir.php';

$pdo = null;
define('DB_HOST', 'localhost');
define('DB_USER', 'root'); 
define('DB_PASSWORD', ''); 
define('DB_NAME', 'checklist'); 
define('APP_ROOT', 'http://localhost/Structure_Template');

try {
    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection Failed: ' . $e->getMessage();
    die();
}
?>
