<?php
if (isset($_GET['edit'])){
    require 'dbh.inc.php';
    session_start();
    $id = $_GET['edit'];
    $sql = "SELECT * FROM priekabos WHERE tnumeris = $id;";
    
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);    
    if($row){
    $_SESSION['update'] = "true";
    $_SESSION['transferValues'] = "true";
    $_SESSION['tNumber'] = $row['tnumeris'];;
    $_SESSION['name'] = $row['pavadinimas'];;
    $_SESSION['weight'] = $row['svoris'];;
    $_SESSION['length'] = $row['ilgis'];;
    $_SESSION['width'] = $row['plotis'];;
    $_SESSION['height'] = $row['aukstis'];;
    $_SESSION['numberPlate'] = $row['numeris'];;
    $_SESSION['city'] = $row['lokacija'];;

    }
    header("Location: ../index.php");

}else{
    exit();
}