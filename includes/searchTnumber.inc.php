<?php
require 'dbh.inc.php';
$tnumber = $_POST['value'];
$tankenValue = "False";
$sql = "SELECT tnumeris FROM priekabos;";
if($result = mysqli_query($conn,$sql)){
    while($row = mysqli_fetch_assoc($result)){
        if($row['tnumeris']==$tnumber){
            $tankenValue = "True";
        }
    }
    echo $tankenValue;
}else{
    header("Location: ../index.php");
    exit();
}
