<?php require_once'config.php';?>
<!DOCTYPE html>
<html lang="en">

<head>



    <title>Üye Ol</title>
    <script>
        function validateForm() {
            var x = document.forms["kayit_form"]["kullaniciAdi"].value;
            var y = document.forms["kayit_form"]["sifre"].value;
            var z = document.forms["kayit_form"]["mail"].value;
            if (x == "") {
                $(document).ready(function(){
    
    
        $("#div").show(1000);
    
});
                return false;
            }
            if (y == "") {
                alert("Şifreyi Boş Bırakamazsınız");
                return false;
            }
            if (z == "") {
                alert("Mail Adresini Boş Bırakamzsınız");
                return false;
            }



        }
    </script>



</head>

<body>
    <!-- Navigation -->
    <?php include 'header.php';

    session_start();
    if($_SESSION["giris"]!="girdi") {
        ?>


        <div class="container">
            <div id="signupbox" style="margin-top:50px"
                 class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">Kayıt Ol</div>
                        <div style="float:right; font-size: 85%; position: relative; top:-36px" id="uyari_div"></div>
                    </div>
										<div id="div" style="display: none;">kullanıcı adını gir</div>
                    <div class="panel-body">
                        <form id="signupform" class="form-horizontal" name="kayit_form" role="form" method="POST"
                              onsubmit="return validateForm()">

                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label">Email</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="mail" placeholder="Email Adresi">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="firstname" class="col-md-3 control-label">Kullanıcı Adı</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="kullaniciAdi"
                                           placeholder="Kullanıcı Adı">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-md-3 control-label">Parola</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="sifre" placeholder="Parola">
                                </div>
                            </div>

                            <div class="form-group">
                                <!-- Button -->
                                <div class="col-md-offset-3 col-md-9">
                                    <button id="btn1" name="git" type="submit" class="btn btn-info"><i
                                                class="icon-hand-right"></i> Üye Ol
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <?php
        $kullaniciAdi = $_POST["kullaniciAdi"];
        $sifre = $_POST["sifre"];
        $mail = $_POST["mail"];
        if (isset($_POST) && isset($kullaniciAdi)) {
            $sor = mysqli_query($baglanti, "select kullaniciAdi,sifre from Uye where kullaniciAdi='$kullaniciAdi'");
            if (mysqli_num_rows($sor) && isset($kullaniciAdi)) {

                echo "Böyle bir kullanıcı adı zaten var!";

            } else {
                $sorgu = "insert into Uye (kullaniciAdi,sifre,mail) values ('$kullaniciAdi','$sifre','$mail')";
                session_start();


                $_SESSION["giris"] = 'girdi';
                $_SESSION["kullaniciAdi"] = $kullaniciAdi;
                $_SESSION["mail"] = $mail;
                $_SESSION["sifre"] = $sifre;

                $ekle = mysqli_query($baglanti, $sorgu);

                header('Location: index.php');


            }
        }


    }
    else
    {
        echo "Zaten Üyesiniz.";
    }

    include 'footer.php';?>

</body>

</html>
