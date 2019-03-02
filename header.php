<?php require_once'config.php';?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Karacabeyimiz Blog</title>
		<script language="javascript" type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
    mode : "textareas"
});
</script>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="http://images.all-free-download.com/images/graphiclarge/harry_potter_icon_6825007.jpg">

    <!-- Theme CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet"/>

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<?php

?>
<header class="intro-header" >

    <div class="container">

        <div class="row">
            <div class="col-md-12 col-lg-12 ">
                <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="col-md-1 col-lg-1 ">
                            <div class="navbar-header page-scroll">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    Menu <i class="fa fa-bars"></i>
                                </button>
                                <a class="navbar-brand" href="index.php">Karacabeyimiz Blog</a>
                            </div>
                        </div>

                        <div class="col-md-11 col-lg-11 col-xs-11">
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <?php
                                    session_start();
                                    if($_SESSION["giris"]=="girdi") {
                                        if($_SESSION["kullaniciAdi"]=="admin") { ?>
                                            <ul class="nav navbar-nav ">
                                                <li>
                                                    <a href="index.php">Ana Sayfa</a>
                                                </li>


                                                <li>
                                                    <a href="cikis.php">Çıkış Yap</a>
                                                </li>
                                                <li>
                                                    <a href="yorum.php">Yorumlar</a>
                                                </li>
                                                <li>
                                                    <a href="about.php">Karacabey Hakkında</a>
                                                </li>
                                                <li>
                                                    <a href="admin.php">Admin Paneli</a>
                                                </li> </ul>
                                        <?php }
                                        else
                                        {?>
                                            <ul class="nav navbar-nav ">
                                                <li>
                                                    <a href="index.php">Ana Sayfa</a>
                                                </li>
                                                <li>
                                                    <a href="about.php">Karacabey Hakkında</a>
                                                </li>
                                                <li>
                                                    <a href="yorum.php">Yorumlar</a>
                                                </li>
                                                <li>
                                                    <a href="cikis.php">Çıkış Yap</a>
                                                </li> </ul>
                                        <?php }?>


                                        <?php
                                    } else {
                                        ?>
                                        <ul class="nav navbar-nav ">
                                            <li>
                                                <a href="index.php">Ana Sayfa</a>
                                            </li>
                                            <li>
                                                <a href="about.php">Karacabey Hakkında</a>
                                            </li>
                                            <li>
                                                <a href="yorum.php">Yorumlar</a>
                                            </li>
                                            <li>
                                                <a href="post.php">Üye Ol</a>
                                            </li>
                                            <li>
                                                <a href="giris.php">Giriş</a>
                                            </li> </ul>

                                        <?php
                                    } ?>




                            </div>
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container -->
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 ">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                                <li data-target="#myCarousel" data-slide-to="3"></li>
                            </ol>




                            <div class="carousel-inner" role="listbox">
                                <div class="item active peopleCarouselImg">
                                    <img class="peopleCarouselImg" src="http://static.panoramio.com/photos/original/25120285.jpg" alt="" />
                                </div>

                                <div class="item peopleCarouselImg">
                                    <img class="peopleCarouselImg" src="http://turkeyfilmcommission.com/uploads/proje/T-rgxUjz_kDu-o4GQrSOd5KzSqWOPiaX.jpg" alt="Karacabey-1 Fotograf" />
                                </div>

                                <div class="item peopleCarouselImg">
                                    <img class="peopleCarouselImg" src="http://www.bursa.com.tr/wp-content/uploads/Atat%C3%BCrk-Park%C4%B1-Karacabey-2.jpg" alt="" />
                                </div>

                                <div class="item peopleCarouselImg">
                                    <img class="peopleCarouselImg" src="http://fotograflarlabursa.com/wp-content/uploads/2015/11/ketendere-karacabey-turu-8.jpg" alt="" />
                                </div>
                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Önceki</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Sonraki</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </div>


</header>