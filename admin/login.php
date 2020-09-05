<?php
#blackwine
session_start();
ob_start();
include('sifre.php');
error_reporting(0);
if(isset($_SESSION["login"])){
header('Location:index.php');
}else{
if(!$_POST){
    $Hata = 0;
}else{
    $Hata = 1;
}
?>
<html>
<head>
    <title>Wine Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php if($Hata == '1'){ ?>
            <div class="hata">Şifre yanlış Tekrar dene!</div>
        <?php } ?>
<style>
body{
    margin:auto;
    width:100%;
    background:#f0f0f0;
}
input[type='password']{
    padding:7px;
    outline:none;
    border:1px solid #555;
    color:#333;
    width:180px;
    box-shadow:1px 1px 2px #ddd;
}
input[type='submit']{
    padding:6px;
    border-radius:2px;
    outline:none;
    border:1px solid #555;
    color:#fff;
    width:180px;
    background:#333;
    cursor:pointer;
    box-shadow:1px 1px 2px #ddd;
}
form{
    text-align:center;
    margin-top:20px;
}
.hata{
    background:red;
    color:#fff;
    padding:7px;
    text-align:center;
    font-family:sans-serif;
    border-radius:0px 0px 3px 0px;
    width:200px;
}
</style>

    <form action="" method="post">
        <img src="main/sex.png" width="300px"><br>
        <input type="password" name="sifre" placeholder="Parola"><br><br>
        <input type="submit" value="Panele Gir">
    </form>

</body>
</html>

<?php } 
if(isset($_POST)){
if($_POST["sifre"]==$sifre){
$_SESSION["login"] = "true";
$_SESSION["pass"] = $sifre;
header("Location:index.php");
}else{
    $Hata = '1';
} }
?>