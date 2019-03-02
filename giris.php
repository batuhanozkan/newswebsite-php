<?php require_once'config.php';?>
<?php include 'header.php';?>
<!DOCTYPE html>
<html lang="en">

<head>



    <title>Üye Giriş</title>
    <script>
        function validateForm() {
            var x = document.forms["kayit_form"]["kullaniciAdi"].value;
            var y = document.forms["kayit_form"]["sifre"].value;

            if (x == "") {
                alert("Kullanıcı Adı Girmelisiniz");
                return false;
            }
            if (y == "") {
                alert("Şifreyi Boş Bırakamazsınız");
                return false;
            }
        }
    </script>


</head>

<body>




<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title">Giriş</div>
            <div style="float:right; font-size: 85%; position: relative; top:-36px" id="uyari_div"></div>
        </div>

        <div style="padding-top:30px" class="panel-body" >
            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

            <form id="signupform" class="form-horizontal" name="kayit_form" role="form" method="POST" onsubmit="return validateForm()">

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="login-username" type="text" class="form-control" name="kullaniciAdi" value="" placeholder="Kullanıcı Adı">
                </div>

                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="login-password" type="password" class="form-control" name="sifre" placeholder="Parola">
                </div>



                <div style="margin-top:10px" class="form-group">
                    <!-- Button -->

                    <div class="col-sm-12 controls">
                        <button id="btn-signup" name="form1" type="submit" class="btn btn-success"><i class="icon-hand-right"></i> Giriş</button>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-12 control">
                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                            <a href="#" style="color:red" id="mesaj">
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$kullaniciAdi=$_POST["kullaniciAdi"];
$sifre=$_POST["sifre"];
    if(isset($_POST)&&isset($kullaniciAdi)) {

    $sor=mysqli_query($baglanti,"select kullaniciAdi,sifre from Uye where kullaniciAdi='$kullaniciAdi' and sifre='$sifre'");
        if(mysqli_num_rows($sor)&&isset($kullaniciAdi))  {
            $_SESSION["giris"] ='girdi';
            $_SESSION["kullaniciAdi"]=$kullaniciAdi;
            $_SESSION["sifre"]=$sifre;
            header("Location:index.php");
        }
        else {
                echo "Kullanici Adi veya Sifre Yanlis.";
            }

}
?>

<?php include 'footer.php';?>
</body>