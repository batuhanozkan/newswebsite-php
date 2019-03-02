
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Paneli</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet"/>
    <link href="css/clean-blog.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="html/css/style.css" type="text/css" media="all" />
    <!-- Theme CSS -->


    <!-- Custom Fonts -->

    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <script>
        function validateForm() {
            var x = document.forms["kayit_form"]["icerik"].value;
            if (x == "") {
                alert("Yorumu Boş Bırakamzsınız");
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
            Yorumlar
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
                        <h2>Yorumlar</h2>

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
                            $sorgu="SELECT * FROM `Yorum` Where onay=1";
                            $sonuc=mysqli_query($baglanti,$sorgu) or die("Sorgu Çalıştırılamadı");
                            while($satir=mysqli_fetch_array($sonuc)) {

                                $ID=$satir["id"];
                                ?>
                                <tr>

                                    <td><h3><a href="#"><?php echo $satir["icerik"] ?></a></h3></td>


                                </tr>
                                <?php
                            }
                            ?>

                        </table>





                    </div>
                    <!-- Table -->

                </div>
                <div class="box">
                    <!-- Box Head -->
                    <div class="box-head">
                        <h2>Yorum Yaz</h2>
                    </div>
                    <!-- End Box Head -->

                    <form id="signupform" name="kayit_form" role="form" method="POST" onsubmit="return validateForm()">

                        <!-- Form -->
                        <div class="form">



                            <p>
                                <span class="req"></span>
                                <label>Yorum <span></span></label>
                                <textarea class="field size1" name="icerik" rows="10" cols="30"></textarea>
                            </p>

                        </div>
                        <input type="submit" class="btn btn-default"></input>
                        <!-- End Form Buttons -->
                    </form>

                    <?php


                    if(isset($_POST)){

// Formdan Gelen Kayıtlar,

                        $icerik =  $_POST["icerik"];
                        $onay = 2;


// Sorun Oluştu mu diye test edelim. Eğer sorun yoksa hata vermeyecektir
                        if(isset($icerik)){
                            $sorgu="insert into Yorum (icerik,onay) values ('$icerik','$onay')";
                            $ekle = mysqli_query($baglanti,$sorgu);
                            echo "yorumunuz onaylandıktan sonra yayınlanacaktır";
                        }

                    }


                    ?>
                </div>
                <!-- End Box -->

            </div>
<?php include 'footer.php';?>