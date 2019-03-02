
<?php require_once'config.php';?>
<?php include  'header.php';
$ID = $_GET["id"];
$sorgu="SELECT * FROM `blog` where id='$ID'";
$sonuc=mysqli_query($baglanti,$sorgu) or die("Sorgu Çalıştırılamadı");
$satir=mysqli_fetch_array($sonuc);
?>
<form action="guncelle.php" method="GET" enctype="multipart/form-data">
    <div class="form">
        <p>
            <span class="req"></span>
            <label>Blog Başlığı</label>
            <input type="text" name="baslik" value="<?php echo $satir["baslik"]?>" class="field size1"/>
        </p>
        <p class="inline-field">
            <label>Tarih</label>
            <input type="date" name="tarih" value="<?php echo $satir["tarih"]?>">
            <input type="hidden" name="id" value="<?php echo $satir["id"]?>">
        </p>

        <p>
            <span class="req"></span>
            <label>İçerik <span></span></label><br/>
            <textarea class="field size1" name="icerik"  rows="10" cols="30"><?php echo $satir["icerik"]?></textarea>
        </p>

    </div>
    <input type="submit" class="btn btn-default">Submit</input>
    <!-- End Form Buttons -->
</form>
<?php include 'footer.php';?>