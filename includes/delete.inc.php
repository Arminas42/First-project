<?php
if(isset($_GET['delete'])){
    require 'dbh.inc.php';
    session_start();
    $id = $_GET['delete'];
    $sql = "DELETE FROM priekabos WHERE tnumeris=$id";
    mysqli_query($conn, $sql);
    header("Location: ../results.php");
    mysqli_close($conn);
    $_SESSION['message'] = "Irasas istrintas";
    $_SESSION['msg_type'] = "danger";
    

}else {
    header("Location: ../results.php");
    exit();
 }