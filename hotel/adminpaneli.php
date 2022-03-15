<?php
require('sistem.php');
require('kontrol.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin Paneli</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logoicon.ico" />
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg bg-navbar text-uppercase fixed-top" id="adminnav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="assets/img/logo.png" class="logo"></a>
            <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>
    <section class="page-section" id="adminpanelgiris">
        <div class="container" >
            <h2 class="page-section-heading text-center text-uppercase text-dark mb-0">TÜM REZERVASYONLAR</h2>
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row">
                <table class="table table-bordered  table-dark">
                <tr>
			 <td>Rez. ID</td> 
             <td>Tel. No.</td>
			 <td>Giriş Tarih</td>
             <td>Çıkış Tarih</td>
			 <td>Oda</td>
			 <td>Çocuk</td>
			 </tr>
<?php 
$sql = "SELECT * FROM rezervasyon";
$musteri = "SELECT * FROM customer";
$res = $conn->query($musteri);
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // her bir satırı döker

    while($row = $result->fetch_assoc()) { ?>
        <tr>
        <td><?php echo $row["rezid"]; ?></td>
        <td><?php echo $row["customer"]; ?></td> 
        <td><?php echo $row["sdate"]; ?></td>
        <td><?php echo $row["edate"]; ?></td>
        <td><?php 
        
        if($row["oda"]==1){
            echo "Küçük Oda";
        } 
        else if($row["oda"]==2){
            echo "Orta Oda";
        }
        else{
            echo "Büyük Oda";
        }
        
        ?></td>
        <td><?php 
        if($row["kid"]==1){
            echo "Çocuklu Müşteri";
        } 
        else{
            echo "Çocuksuz Müşteri";
        }
        
        ?></td>
        <td><a href="rezervasyondegistir.php?rez=<?php echo $row['rezid'] ?>&admin=1" class="btn btn-primary text-white">Değiştir</a></td> <!-- EKSİK -->
        <td><a class="btn btn-danger text-white" href="adminrezsil.php?rez=<?php echo $row['rezid'] ?>" type="submit" >Sil</a></td>
         </tr>
        

         <?php }  

} else {

    echo "0 results";

}

?>
                </table>
            </div>
        </div>
    </section>
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright © Eray Mulla 2020</small></div>
    </div>
</body>

</html>