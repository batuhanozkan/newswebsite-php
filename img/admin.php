<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Paneli</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"/>
    <link href="css/clean-blog.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="html/css/style.css" type="text/css" media="all" />
    <!-- Theme CSS -->


    <!-- Custom Fonts -->

    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <script>
        function validateForm() {
            var x = document.forms["kayit_form"]["baslik"].value;
            var y = document.forms["kayit_form"]["icerik"].value;
            var z = document.forms["kayit_form"]["tarih"].value;
            if (x == "") {
                alert("Başlık Girmelisiniz");
                return false;
            }
            if (y == "") {
                alert("İçerik Girmelisiniz");
                return false;
            }
            if (z == "") {
                alert("Tarih Girmelisiniz");
                return false;
            }



        }
    </script>

</head>
<?php require_once'config.php';?>
<?php include  'header.php';?>
<div id="container">
    <div class="shell">

        <!-- Small Nav -->
        <div class="small-nav">
            <a href="#">Dashboard</a>
            <span>&gt;</span>
            Bloglar
        </div>
        <!-- End Small Nav -->

        <!-- Message OK -->

        <!-- End Message Error -->
        <br />
        <!-- Main -->
        <div id="main">
            <div class="cl">&nbsp;</div>

            <!-- Content -->
            <div id="content">

                <!-- Box -->
                <div class="box">
                    <!-- Box Head -->
                    <div class="box-head">
                        <h2>Bloglar</h2>

                    </div>
                    <!-- End Box Head -->

                    <!-- Table -->
                    <div class="table">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>

                                <th>Title</th>
                                <th>Date</th>
                                <th>Added by</th>
                                <th width="110" class="ac">Content Control</th>
                            </tr>
                            <?php
                            $sorgu="SELECT * FROM `blog`";
                            $sonuc=mysqli_query($baglanti,$sorgu) or die("Sorgu Çalıştırılamadı");
                            while($satir=mysqli_fetch_array($sonuc)) {

                                $ID=$satir["id"];
                                ?>
                                <tr>

                                    <td><h3><a href="#"><?php echo $satir["baslik"] ?></a></h3></td>
                                    <td><?php echo $satir["tarih"] ?></td>
                                    <td><a href="#"><?php
                                            $degisken = $satir["kullanici"];
                                            $sorgu1 = "SELECT * FROM `Uye` Where id=$degisken";
                                            $sonuc1 = mysqli_query($baglanti, $sorgu1) or die("Sorgu Çalıştırılamadı");
                                            $satir1 = mysqli_fetch_array($sonuc1);

                                            echo $satir1["kullaniciAdi"];
                                            ?></a></td>
                                    <td><a href='sil.php?id=<?php echo $satir["id"]?>' class="ico del">Sil</a><a href='duzenle.php?id=<?php echo $satir["id"]?>' class="ico edit">Düzenle</a></td>
                                </tr>
                                <?php
                            }
                            ?>

                        </table>





                    </div>
                    <!-- Table -->

                </div>
                <!-- End Box -->

                <!-- Box -->
                <div class="box">
                    <!-- Box Head -->
                    <div class="box-head">
                        <h2>Yeni Bir Blog Oluştur</h2>
                    </div>
                    <!-- End Box Head -->

                    <form id="signupform" name="kayit_form" role="form" method="POST" onsubmit="return validateForm()">

                        <!-- Form -->
                        <div class="form">
                            <p>
                                <span class="req"></span>
                                <label>Blog Başlığı</label>
                                <input type="text" name="baslik" class="field size1"/>
                            </p>
                            <p class="inline-field">
                                <label>Tarih</label>
                                <input type="date" name="tarih">
                            </p>

                            <p>
                                <span class="req"></span>
                                <label>İçerik <span></span></label>
                                <textarea class="field size1" name="icerik" rows="10" cols="30"></textarea>
                            </p>

                        </div>
                        <input type="submit" class="btn btn-default"></input>
                        <!-- End Form Buttons -->
                    </form>

                    <?php


                    if(isset($_POST)){

// Formdan Gelen Kayıtlar,
                        $kullanici=1;
                        $baslik =  $_POST["baslik"];
                        $icerik = $_POST["icerik"];
                        $tarih = $_POST["tarih"];


// Sorun Oluştu mu diye test edelim. Eğer sorun yoksa hata vermeyecektir
                        if(isset($baslik)){
                            $sorgu="insert into blog (kullanici,baslik,icerik,tarih) values ('$kullanici','$baslik','$icerik','$tarih')";
                            $ekle = mysqli_query($baglanti,$sorgu);
                        }

                    }
                    ?>
                </div>
                <!-- End Box -->

            </div>
            <!-- SLIDER EKLE BAŞLANGIÇ -->
            <?php
            if ($_POST) {
                if($_FILES["resim"]["type"]=="image/jpeg" or $_FILES["resim"]["type"]=="image/png") {
                    $dosya_adi=$_FILES["resim"]["name"];
                    $uret=array("as","rt","ty","yu","fg");
                    $uzanti = substr($dosya_adi,-4,4);
                    $sayi_tut=rand(1,10000);
                    $yeni_ad="/public_html/img/".$uret[rand(0,4)].$sayi_tut.$uzanti; // DOSYA AD OLUŞTURMA /home/u361568741/public_html/img/
                    if(move_uploaded_file($_FILES["resim"]["tmp_name"],$yeni_ad)) {
                        echo "Dosya başarıyla yüklendi ";
                        $sorgu = mysqli_query($baglanti,"INSERT INTO resimler (resim) values ('$yeni_ad')");
                        if ($sorgu) {
                            echo 've veritabanına kaydedildi';
                        }
                        else {
                            echo 'Kayıt sırasında hata oluştu.';
                        }
                    }
                    else {
                        echo "Dosya yüklenemedi";
                    }
                }
                else {
                    echo "Dosya yalnızca jpeg veya png formatında olmalıdır!";
                }
            }

            ?>

            <form action="" method="post" name="form1" enctype="multipart/form-data">
                <input type="file" name="resim"/><br/>
                <input type="submit" name="gonder" value="Kaydet"/>

            </form>

            <?php
                $sorgu1 = "select * from resimler";
                $sorgu2 = mysqli_query($baglanti,$sorgu1);
                //if (mysql_num_rows($sorgu2)) {
                echo '<table>';
                while($kayit=mysqli_fetch_array($sorgu2)) {
                    echo '<tr>';
                    echo '<td><img src="'.$kayit["resim"].'" width="75" height="75"/></td>';
                    echo '<td><img src="/public_html/img/fg5178.jpg" width="75" height="75"/></td>'; // /home/u361568741/public_html/img/fg2394.jpg

                    echo '</tr>';
                }
                echo '</table>';
                //}
            ?>
            <!-- SLIDER EKLE BITIŞ -->

            <!-- Main -->
        </div>
    </div>
<?php include 'footer.php';?>