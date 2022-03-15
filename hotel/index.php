<?php
require('sistem.php');

if (isset($_POST['gsm'])) {
    $_POST['cocuk'] = isset($_POST['cocuk']) ? '1' : '0';
    $kayit1 = mysqli_query($conn, "INSERT INTO customer (`cusname`, `telno`, `mail`) VALUES ('" . $_POST['adsoyad'] . "','" . $_POST['gsm'] . "','" . $_POST['email'] . "') ");
    $kayit = mysqli_query($conn, "INSERT INTO rezervasyon (`sdate`, `edate`, `oda`, `customer`, `kid`) VALUES ('" . $_POST['giris'] . "','" . $_POST['cikis'] . "','" . $_POST['oda'] . "','" . $_POST['gsm'] . "','" . $_POST['cocuk'] . "') ");
    echo "<script>alert('Rezervasyonunuz eklenmiştir. Rezervasyon Numaranız : ".mysqli_insert_id($conn)." Lütfen rezervasyon numaranızı not alınız.');window.location.href='index.php';</script>";
}
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
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#odalar">ODALARIMIZ</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#hakkimizda">HAKKIMIZDA</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" id="rezervasyonn" href="#rezervasyon">REZERVASYON</a></li>
                    <a href="rezervasyonyonet.php"><button class="btn btn-danger rezbuton" type="submit">Rezervasyon Yönet</button></a>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead text-white text-center">
        <img src="assets/img/banner.jpg" width="100%">
        <div class="banner-yazi">
            <h1 class="masthead-heading text-uppercase mb-0">BİR OTELDEN FAZLASI</h1>
            <div class="divider-custom divider-light">
                <div class="divider-custom-icon"><i class="fas fa-2x fa-star"></i><i class="fas fa-2x fa-star"></i><i class="fas fa-2x fa-star"></i></div>
            </div>
        </div>
    </header>
    <section class="page-section portfolio" id="odalar">
        <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-dark mb-0">ODALARIMIZ</h2>
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#kucukoda">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white">
                                <p>Küçük Oda</p>
                                <i class="fas fa-plus fa-2x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="assets/img/odalar/kucuk1.jpg" alt="" />
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#ortaoda">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white">
                                <p>Orta Oda</p>
                                <i class="fas fa-plus fa-2x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="assets/img/odalar/orta1.jpg" alt="" />
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#buyukoda">
                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content text-center text-white">
                                <p>Büyük Oda</p>
                                <i class="fas fa-plus fa-2x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="assets/img/odalar/buyuk1.jpg" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section bg-primary text-white mb-0" id="hakkimizda">
        <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-white">Hakkımızda</h2>
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row">
                <div class="col-lg-4 ml-auto">
                    <p class="lead">Akdeniz sıcaklığını temsil eden Otelimiz cömertliği, gelenekselliği ve yerel zenginliği simgelemektedir. Minimalist zevkle döşenmiş odalar, masa, çekmece ve TV seti gibi fonksiyonel mobilyalar için yeterli alana sahiptir. Otel ayrıca atölyeler, iş toplantıları ve ziyafetler gibi profesyonel olarak düzenlenen etkinliklerle de ünlü olduğu için konukların güvenliğine yönetim tarafından öncelik verilir. Kebap, et ve Akdeniz mutfağından spesiyaliteler gibi leziz yemekler yemeklerin kalitesini vurgular.</p>
                </div>
                <div class="col-lg-4 mr-auto">
                    <p class="lead">Adana merkezinde yer alan oteller arasında bulunan Otelimiz ile Adana Şakirpaşa Havalimanı ve Adana otobüs terminalı araba ile yalnızca 10 dakikada uzaklıktadır. Adana’nın şehirlerarası otobüs terminaline 6 km uzaklıkta bulunan otel Optimum Alışveriş Merkezi'ne ise 5 km mesafededir. Devlet Hastanesine 3 km, Gençlik Stadı ve merkez parka 2 km mesafede konumlandırılan otel ulaşım avantajı sağlar.</p>
                </div>
            </div>

        </div>
    </section>
    <section class="page-section" id="rezervasyon">
        <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-dark mb-0">REZERVASYON</h2>
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
                                <input class="form-control" name="adsoyad" type="text" placeholder="Ad Soyad" required="required" />
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="email" type="email" placeholder="E-mail Adresi" required="required" />
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="gsm" type="tel" placeholder="Telefon Numarası" required="required" />
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="giris" type="text" placeholder="21/07/2020" onkeyup="
        var v = this.value;
        if (v.match(/^\d{2}$/) !== null) {
            this.value = v + '/';
        } else if (v.match(/^\d{2}\/\d{2}$/) !== null) {
            this.value = v + '/';
        }" required="required" maxlength="10" />
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="cikis" type="text" placeholder="22/07/2020" onkeyup="
        var v = this.value;
        if (v.match(/^\d{2}$/) !== null) {
            this.value = v + '/';
        } else if (v.match(/^\d{2}\/\d{2}$/) !== null) {
            this.value = v + '/';
        }" required="required" maxlength="10" />
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <select class="form-control" id="odaselect" name="oda">
                                    <option value="1">Küçük Oda</option>
                                    <option value="2">Orta Oda</option>
                                    <option value="3">Büyük Oda</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input type="checkbox" name="cocuk" id="cocuk">
                                <label for="cocuk">Çocuklu Misafir</label>
                            </div>
                        </div>
                        <div class="form-group"><button class="btn btn-primary" type="submit">Rezervasyon Yap</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="mb-4">Bizi Tercih Ettiğiniz İçin Teşekkürler !</h4>

                </div>

            </div>
        </div>
    </footer>
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright © Eray Mulla 2020</small>
        <a href="adminpaneligiris.php" id="adminlink">Admin Paneli</a></div>
    </div>
    <div class="scroll-to-top d-lg-none position-fixed">
        <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
    </div>
    <div class="portfolio-modal modal fade" id="kucukoda" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <h2 class="portfolio-modal-title text-dark text-uppercase mb-0 mt-4" id="portfolioModal1Label">KÜÇÜK ODA</h2>
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <div class="slideshow-container">
                                    <div class="kucukSlider">
                                        <img src="assets/img/odalar/kucuk1.jpg" style="width:100%">
                                    </div>
                                    <div class="kucukSlider">
                                        <img src="assets/img/odalar/kucuk2.jpg" style="width:100%">
                                    </div>
                                </div>
                                <p class="mb-5">Yeni Konforlu yatak takımıyla döşenmiş bu yeni odamız, konforda son noktayı sunar: 2 adet rahat yatak, masa, İnternet, parke zemin, en iyi kanalların bulunduğu LCD düz ekran TV ve duşlu banyo.</p>
                                <a class="btn btn-primary text-white" onclick="odaSec(1);">
                                    Bu Oda İçin Rezervasyon
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="ortaoda" tabindex="-1" role="dialog" aria-labelledby="portfolioModal2Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <h2 class="portfolio-modal-title text-dark text-uppercase mb-0 mt-4" id="portfolioModal2Label">ORTA ODA</h2>
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <div class="slideshow-container">
                                    <div class="ortaSlider">
                                        <img src="assets/img/odalar/orta1.jpg" style="width:100%">
                                    </div>
                                    <div class="ortaSlider">
                                        <img src="assets/img/odalar/orta2.jpg" style="width:100%">
                                    </div>
                                </div>
                                <p class="mb-5">Yeni Konforlu yatak takımıyla döşenmiş bu yeni odamız, konforda son noktayı sunar: 2 adet rahat yatak, masa, İnternet, parke zemin, en iyi kanalların bulunduğu LCD düz ekran TV ve duşlu banyo.</p>
                                <a class="btn btn-primary text-white" onclick="odaSec(2);">
                                    Bu Oda İçin Rezervasyon
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="buyukoda" tabindex="-1" role="dialog" aria-labelledby="portfolioModal3Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <h2 class="portfolio-modal-title text-dark text-uppercase mb-0 mt-4" id="portfolioModal3Label">BÜYÜK ODA</h2>
                                <div class="divider-custom">
                                    <div class="divider-custom-line"></div>
                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                    <div class="divider-custom-line"></div>
                                </div>
                                <div class="slideshow-container">
                                    <div class="buyukSlider">
                                        <img src="assets/img/odalar/buyuk1.jpg" style="width:100%">
                                    </div>
                                    <div class="buyukSlider">
                                        <img src="assets/img/odalar/buyuk2.jpg" style="width:100%">
                                    </div>
                                </div>
                                <p class="mb-5">Yeni Konforlu yatak takımıyla döşenmiş bu yeni odamız, konforda son noktayı sunar: 2 adet rahat yatak, masa, İnternet, parke zemin, en iyi kanalların bulunduğu LCD düz ekran TV ve duşlu banyo.</p>
                                <a class="btn btn-primary text-white" onclick="odaSec(3);">
                                    Bu Oda İçin Rezervasyon
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script>
        var slideIndex = 0;
        showkucukSlides();
        showortaSlides();
        showbuyukSlides();

        function showkucukSlides() {
            var i;
            var slides = document.getElementsByClassName("kucukSlider");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showkucukSlides, 2000);
        }

        function showortaSlides() {
            var i;
            var slides = document.getElementsByClassName("ortaSlider");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showortaSlides, 2000);
        }

        function showbuyukSlides() {
            var i;
            var slides = document.getElementsByClassName("buyukSlider");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showbuyukSlides, 2000);
        }

        function odaSec(oda) {
            if ($('.modal.show').length) {
                $('.modal.show').modal('hide');
            }
            $('#rezervasyonn').click();
            document.getElementById("odaselect").selectedIndex = oda - 1;
        }
    </script>
</body>

</html>