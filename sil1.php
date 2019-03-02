<?php require_once'config.php';
$ID = $_GET["id"];
echo $ID;
$delete = mysqli_query($baglanti,"delete from Yorum where id='$ID'");

if ($delete)
{
    header('Location: admin.php');
}
else
{
    echo "Hata";
}
?>