<?php

#CODED BY Black Wine

$servername = "localhost";
$dbname     = "wine";
$username   = "root";
$password   = "";

try {
     $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $db->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
    }
catch(PDOException $e)
    {
     echo "Connection failed: " . $e->getMessage();
    }

#CODED BY Black Wine

?>