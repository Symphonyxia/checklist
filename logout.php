<?php
session_start();
include 'boot.php';


session_destroy();


header("Location: index.php");
exit();
