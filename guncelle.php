<?php require_once'config.php';
    $ID=$_GET["id"];
    $baslik=$_GET["baslik"];
    $icerik=$_GET["icerik"];
    $tarih=$_GET["tarih"];
    $kullanici=1;

$sorgu=mysqli_query($baglanti,"update blog set kullanici='$kullanici',baslik='$baslik',icerik='$icerik',tarih='$tarih' where id='$ID'");
if ($sorgu)
{

    header('Location: admin.php');
}
else
{
    echo "Hata";
}
?>
