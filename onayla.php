<?php require_once'config.php';
$ID=$_GET["id"];
$icerik=$_GET["icerik"];


$sorgu=mysqli_query($baglanti,"update Yorum set onay=1 where id='$ID'");
if ($sorgu)
{

    header('Location: admin.php');
}
else
{
    echo "Hata";
}
?>