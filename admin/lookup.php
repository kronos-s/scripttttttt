<?php
session_start();
ob_start();
if(!isset($_SESSION["login"])){
header('Location:login.php');
}
if(isset($_GET['BIN'])){
  $BIN = $_GET['BIN'];
  $opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n")); 
  $context = stream_context_create($opts);
  $Site = @file_get_contents('https://lookup.binlist.net/'.$BIN,false,$context);
  $Lookup = json_decode($Site, true);
  $BankName = $Lookup["bank"]["name"];
  $Brand = $Lookup["brand"];
  $Type = $Lookup["type"];
  $Scheme = $Lookup["scheme"];
  $Currency = $Lookup["country"]["currency"];
  if($Type=='credit'){
    $Type = 'Kredi Kartı';
  }elseif($Type=='debit'){
    $Type = 'Debit Kart';
  }elseif($Type=='amex'){
    $Type=='AMEX Kart';
  }else{
    $Type=='Bilinmeyen';
  }
  ?>
  <title><?=$_GET['BIN']?> -BIN</title>
<style>
*{
  font-family:Sans-serif;
}
div{
  padding:20px;
}
td{
  padding:7px;
}
th{
  text-align:left;
}
button {
    padding: 0.53em 1em;
    background-color: #329da8;
    border-radius: 2px;
    cursor: pointer;
    border: none;
    color: #fff;
    margin-left:10px;
  }
</style>
  <div>
  <img src="main/wine.png" width="190px"><br><br>
  <table>
  <tr>
  <td>KART BIN</td>
  <td><?=$BIN?></td>
  </tr>
  <tr>
  <td>BANKA ADI</td>
  <td><?=$BankName?></td>
  </tr>
  <tr>
  <td>KART TÜRÜ</td>
  <td><?=$Brand?></td>
  </tr>
  <tr>
  <td>KART TİPİ</td>
  <td><?=$Type?></td>
  </tr>
  <tr>
  <td>KART TİPİ</td>
  <td><?=strtoupper($Scheme)?></td>
  </tr>
  <tr>
  <td>PARA BİRİM</td>
  <td><?=$Currency?></td>
  </tr>
  </table>
  <br>
  <a href="index.php"><button type="submit">Geri Dön</button></a>
  </div>
  <?php
  }
  ?>