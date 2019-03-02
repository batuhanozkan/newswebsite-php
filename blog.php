<?php require_once'config.php';?>
<?php include  'header.php';
$ID = $_GET["id"];
$sorgu="SELECT * FROM `blog` where id='$ID'";
$sonuc=mysqli_query($baglanti,$sorgu) or die("Sorgu Çalıştırılamadı");
$satir=mysqli_fetch_array($sonuc);?>
<div class="post-preview">
                <a href="post.php">
                    <h2 class="post-title">
                        <?php
                        echo $satir["baslik"];
                        ?>
</h2>
<h3 class="post-subtitle">
    <?php
    echo $satir["icerik"];
    ?>
</h3>
</a>
<p class="post-meta">Posted by <a href="#"><?php

        $degisken=$satir["kullanici"];
        $sorgu1="SELECT * FROM `Uye` Where id=$degisken";
        $sonuc1=mysqli_query($baglanti,$sorgu1) or die("Sorgu Çalıştırılamadı");
        $satir1=mysqli_fetch_array($sonuc1);
        echo $satir1["kullaniciAdi"]; ?>
    </a> on September 24, 2014</p>
</div>
<hr>

<?php include 'footer.php';?>