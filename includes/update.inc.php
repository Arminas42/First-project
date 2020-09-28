<?php
if(isset($_POST['taisyti'])){
    require 'dbh.inc.php';
    $date = $_POST['data'];
    $name = $_POST['pavadinimas'];
    $length = $_POST['ilgis'];
    $width = $_POST['plotis'];
    $height = $_POST['aukstis'];
    $numberPlate = $_POST['numeris'];
    $location = $_POST['lokacija'];
    $weight = $_POST['svoris'];
    $tNumber = $_POST['identifikacija'];
    $sql = "UPDATE priekabos SET priekabosData = '$date', pavadinimas = '$name', ilgis = '$length', plotis = '$width', aukstis = '$height', numeris= '$numberPlate', lokacija = $location, svoris = '$weight' WHERE tnumeris = $tNumber;";
    mysqli_query($conn,$sql);
    mysqli_close($conn);
    header("Location: ../index.php");
}else {
    header("Location: ../index.php");
    exit;
}