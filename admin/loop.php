<?php if(isset($_GET['BIN'])){
  $BIN = $_GET['BIN'];
  $opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n")); 
  $context = stream_context_create($opts);
  $Site = @file_get_contents('https://lookup.binlist.net/'.$BIN,false,$context);
  $Lookup = json_decode($Site, true);
  $BankName = $Lookup["bank"]["name"];
  $Brand = $Lookup["brand"];
  $Type = $Lookup["type"];
  $Currency = $Lookup["currency"]; ?>
  <div id="Box">
  <?php echo 'BIN: '.$BIN.'<br>Banka Adı: '.$BankName.'<br>Kart Türü: '.$Brand.'<br>Kart Tipi: '.$Type.'<br>Para Birimi: '.$Currency; ?>
  </div>
  <?php header('Refresh:2; url=index.php');
  }
  ?>