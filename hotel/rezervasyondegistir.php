<?php
require('sistem.php');

if (isset($_GET['rez'])) {
    $kontrol = mysqli_query($conn, "SELECT rezervasyon.*,customer.* FROM rezervasyon INNER JOIN customer ON rezervasyon.customer = customer.telno WHERE rezid = '" . $_GET["rez"] . "'");
    if (!mysqli_num_rows($kontrol)) {
        header("location:rezervasyonyonet.php");
        exit();
    }
    $veri = mysqli_fetch_assoc($kontrol);
}

if (isset($_POST['gsm'])) {
    $_POST['cocuk'] = isset($_POST['cocuk']) ? '1' : '0';
    $update = mysqli_query($conn, "UPDATE rezervasyon SET sdate = '" . $_POST['giris'] . "' , edate = '" . $_POST['cikis'] . "' , oda ='" . $_POST['oda'] . "', kid = '" . $_POST['cocuk'] . "' WHERE rezid = '" . $_GET["rez"] . "'");
    if(isset($_GET['admin'])){
        echo "<script>window.alert('Rezervasyonunuz güncellenmiştir');window.location.href='adminpaneli.php';</script>";
    }
    echo "<script>window.alert('Rezervasyonunuz güncellenmiştir');window.location.href='index.php';</script>";
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
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php">ODALARIMIZ</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php">HAKKIMIZDA</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" id="rezervasyonn" href="index.php">REZERVASYON</a></li>
                    <a href="rezervasyonyonet.php"><button class="btn btn-danger rezbuton" type="submit">Rezervasyon Yönet</button></a>
                </ul>
            </div>
        </div>
    </nav>
    <section class="page-section" id="rezervasyon">
        <div class="container">
            <h2 class="page-section-heading text-center text-uppercase text-dark mb-0 mt-15">REZERVASYON</h2>
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
                                <input class="form-control" name="adsoyad" type="text" placeholder="Ad Soyad" required="required" readonly value="<?php echo $veri['cusname']; ?>" />
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="email" type="email" placeholder="E-mail Adresi" required="required" readonly value="<?php echo $veri['mail']; ?>" />
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="gsm" type="tel" placeholder="Telefon Numarası" required="required" readonly value="<?php echo $veri['telno']; ?>" />
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input class="form-control" name="giris" type="text" value="<?php echo $veri['sdate']; ?>" onkeyup="
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
                                <input class="form-control" name="cikis" type="text" value="<?php echo $veri['edate']; ?>" onkeyup="
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
                                    <?php switch ($veri['oda']) {
                                        case 1:
                                            echo '<option value="1">Küçük Oda</option><option value="2">Orta Oda</option>
                                            <option value="3">Büyük Oda</option>';
                                            break;
                                        case 2:
                                            echo '<option value="2">Orta Oda</option><option value="1">Küçük Oda</option>
                                            <option value="3">Büyük Oda</option>';
                                            break;
                                        case 3:
                                            echo '<option value="3">Büyük Oda</option><option value="1">Küçük Oda</option><option value="2">Orta Oda</option>';
                                            break;
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group controls mb-3 pb-2">
                                <input type="checkbox" name="cocuk" id="cocuk" <?php if ($veri['kid']) echo 'checked'; ?>>
                                <label for="cocuk">Çocuklu Misafir</label>
                            </div>
                        </div>
                        <div class="form-group"><button class="btn btn-primary" type="submit">Rezervasyon Değiştir</button>
                            <a class="btn btn-danger text-white" href="rezervasyonsil.php?rez=<?php echo $veri['rezid'] ?>" type="submit">Rezervasyon Sil</a></div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright © Eray Mulla 2020</small></div>
    </div>
    <div class="scroll-to-top d-lg-none position-fixed">
        <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
    </div>

    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>