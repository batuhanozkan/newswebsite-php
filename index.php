<?php require_once'config.php';?>
<?php include 'header.php';?>
<!DOCTYPE html>
<html lang="en">




<!-- Main Content -->





        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?php

                $sorgu="SELECT * FROM `blog` ORDER BY id DESC";
                
                $sonuc=mysqli_query($baglanti,$sorgu) or die("Sorgu Çalıştırılamadı");
                while($satir=mysqli_fetch_array($sonuc))
                {
                ?>
                <div class="post-preview">
                   
                        <h2 class="post-title">
                            <a href='blog.php?id=<?php echo $satir["id"]?>' class="post-title"><?php echo $satir["baslik"]?></a>
                        </h2>
                        <h3 class="post-subtitle">
                           <i>
                               <?php

                               $yazikisa = substr($satir["icerik"],0,181);
                               echo $yazikisa . "...";?>
                               <a href='blog.php?id=<?php echo $satir["id"]?>'>Devamını Gör</a></i>
                        </h3>
                    
                    <p class="post-meta">Posted by <a href="#"><?php

                            $degisken=$satir["kullanici"];
                            $sorgu1="SELECT * FROM `Uye` Where id=$degisken";
                            $sonuc1=mysqli_query($baglanti,$sorgu1) or die("Sorgu Çalıştırılamadı");
                            $satir1=mysqli_fetch_array($sonuc1);
                            echo $satir1["kullaniciAdi"]; ?></a> Tarih:<?php echo $satir["tarih"]; ?>
                </div>
                <?php } ?>
                <hr>

                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        <a href="#">Older Posts &rarr;</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>









<?php include 'footer.php';?>
</body>

</html>
