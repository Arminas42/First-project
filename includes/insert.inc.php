<?php
function checkValues($date,$name,$length,$width,$height,$numberPlate,$location,$weight,$tNumber){
$isError = false;
if (empty($name) || !preg_match("/^[a-zA-Z0-9\s]*$/", $name)){
$_SESSION['nameError'] = "is-invalid";
$isError = true;
}
if (empty($date) || !preg_match("/^[0-9-]*$/", $date)){
   $_SESSION['dateError'] = "is-invalid";
   $isError = true;
} 
if (empty($length) || $length==0){
   $_SESSION['lengthError'] = "is-invalid";
   
} 
if (empty($width) || $width==0){
   $_SESSION['widthError'] = "is-invalid";
   
   $isError = true;
} 
if (empty($height) || $height==0){
   $_SESSION['heightError'] = "is-invalid";
   $isError = true;
} 
if (empty($numberPlate) || !preg_match("/^[a-zA-Z0-9\s]*$/", $name)){
   $_SESSION['numberPlateError'] = "is-invalid";
   $_SESSION['numberPlate'] = $numberPlate;
   $isError = true;
} 
if (empty($location) || !preg_match("/^[a-zA-Z]*$/", $name)){
   $_SESSION['locationError'] = "is-invalid";
   $isError = true;
} 
if (empty($weight) || $weight == 0){
   $_SESSION['weightError'] = "is-invalid";
   $isError = true;
} 
if (empty($tNumber) || $tNumber == 0){
   $_SESSION['tNumberError'] = "is-invalid";
   
   $isError = true;
} 
if($isError == true){
   $_SESSION['transferValues']="true";
   $_SESSION['tNumber'] = strval($tNumber);
   $_SESSION['weight'] = strval($weight);
   $_SESSION['city'] = $location;
   $_SESSION['height'] = strval($height);
   $_SESSION['length'] = strval($length);
   $_SESSION['date'] = $date;
   $_SESSION['name'] = $name;
   $_SESSION['width'] = strval($width);

}
return $isError;
}

if (isset($_POST['pateikti'])){
    require 'dbh.inc.php';
    session_start();
    $date = $_POST['data'];
    $name = $_POST['pavadinimas'];
    $length = $_POST['ilgis'];
    $width = $_POST['plotis'];
    $height = $_POST['aukstis'];
    $numberPlate = $_POST['numeris'];
    $location = $_POST['lokacija'];
    $weight = $_POST['svoris'];
    $tNumber = $_POST['identifikacija'];
    
if(checkValues($date,$name,$length,$width,$height,$numberPlate,$location,$weight,$tNumber)==false){
$sql = "INSERT INTO priekabos (priekabosData, pavadinimas, ilgis, plotis, aukstis, numeris, lokacija, svoris, tnumeris) VALUES ('$date', ?, ?, ?, ?, ?, ?, ?, ?);";
$stmt = mysqli_stmt_init($conn);

   if (!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../index.php?error=sqlerror");
      exit();
   } else {
      mysqli_stmt_bind_param($stmt, "siiissdi", $name, $length, $width, $height, $numberPlate, $location, $weight, $tNumber);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
      header("Location: ../index.php?inserting=success");
      $_SESSION['message'] = "Irasas issaugotas";
      $_SESSION['msg_type'] = "success";
      mysqli_close($conn);
      exit();

         }
}else {
   header("Location: ../index.php?inserting=error");
   exit();
}
    
     
   
}

if(isset($_POST['taisyti'])){
   require 'dbh.inc.php';
   session_start();
   $date = $_POST['data'];
    $name = $_POST['pavadinimas'];
    $length = $_POST['ilgis'];
    $width = $_POST['plotis'];
    $height = $_POST['aukstis'];
    $numberPlate = $_POST['numeris'];
    $location = $_POST['lokacija'];
    $weight = $_POST['svoris'];
    $tNumber = $_POST['identifikacija'];
   
   if(checkValues($date,$name,$length,$width,$height,$numberPlate,$location,$weight,$tNumber)==false){
   $sql = "UPDATE priekabos SET priekabosData = '$date', pavadinimas = ?, ilgis = ?, plotis = ?, aukstis = ?, numeris= ?, lokacija = ?, svoris = ? WHERE tnumeris = $tNumber;";
   $stmt = mysqli_stmt_init($conn);

   if (!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../index.php?error=sqlerror");
      exit();
   } else {
      mysqli_stmt_bind_param($stmt, "siiissd", $name, $length, $width, $height, $numberPlate, $location, $weight);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
      header("Location: ../index.php?inserting=success");
      $_SESSION['message'] = "Irasas issaugotas";
      $_SESSION['msg_type'] = "success";
      mysqli_close($conn);
      exit();

         }
   }else {
   header("Location: ../index.php");
   exit;
   }
}