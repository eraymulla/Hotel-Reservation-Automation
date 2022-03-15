<?php 
require('sistem.php');
if(isset($_GET['rez'])){
    $kontrol = mysqli_query($conn, "SELECT * FROM rezervasyon WHERE rezid = '" . $_GET["rez"] . "'");
    if (!mysqli_num_rows($kontrol)) {
        header("location:index.php");
        exit();
    }
    else{
        $sil = mysqli_query($conn, "DELETE FROM rezervasyon WHERE rezid = '" . $_GET["rez"] . "'");
        echo "<script>alert('Rezervasyonunuz silinmiştir.');window.location.href='adminpaneli.php';</script>";
    }
}
else{
    header("location:index.php");
    exit();
}

?>