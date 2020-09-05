<?php 
include('../baglan.php');
$sifreVeri = $db->query("SELECT * FROM panel WHERE id = '1'")->fetch(PDO::FETCH_ASSOC);
$sifre = $sifreVeri['sifre'];
?>