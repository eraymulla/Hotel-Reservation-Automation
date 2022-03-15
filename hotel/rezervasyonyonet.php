<?php
require('sistem.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Otel Rezervasyon Sistemi</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logoicon.ico" />
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg bg-navbar text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="assets/img/logo.png" class="logo"></a>
            <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php">ODALARIMIZ</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php">HAKKIMIZDA</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" id="rezervasyonn" href="index.php">REZERVASYON</a></li>
                    <a href="rezervasyonyonet.php"><button class="btn btn-danger rezbuton" type="submit">Rezervasyon Yönet</button></a>
                </ul>
            </div>
        </div>
    </nav>
    <section class="page-section mt-15">
        <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-dark mb-0">REZERVASYON YÖNETİMİ</h2>
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form method="POST">
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="gsm" type="text" placeholder="Telefon Numarası" required="required" />
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="rezno" type="number" placeholder="Rezervasyon Numarası" required="required" />
                            </div>
                        </div>
                        <div class="form-group"><button class="btn btn-primary" type="submit">Rezervasyonu Bul</button></div>
                    </form>
                    <?php
                    if (isset($_POST['gsm']) && isset($_POST['rezno'])) {
                        $kontrol = mysqli_query($conn, "SELECT `rezid`,`customer` FROM rezervasyon WHERE rezid = '".$_POST["rezno"]."' AND customer = '".$_POST["gsm"]."'");
                        if(mysqli_num_rows($kontrol))
                        {
                            header("location:rezervasyondegistir.php?rez=".$_POST["rezno"]."");
                            exit();
                        }
                        else {
                            echo 'Girilen kriterlere ait rezervasyon bulunamadı!';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright © Eray Mulla 2020</small></div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>