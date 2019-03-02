<?php
$baglanti=mysqli_connect("localhost","u361568741_webtk","webtekno321") or die("Veritabanı sunucusuna bağlanaılaması");
mysqli_query($baglanti,"SET NAMES 'utf8'");
mysqli_query($baglanti,"SET CHARACTER SET utf8_general_ci");
$vt=mysqli_select_db($baglanti,"u361568741_krcby") or die("veritabanına ulaşılamadı");
?>