<?php
require 'dbh.inc.php';
$sql= "SELECT * FROM priekabos;";
$result = mysqli_query($conn,$sql);

$response = array();
$posts = array();
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result)){
        $date = $row['priekabosData'];
        $name = $row['pavadinimas'];
        $length = $row['ilgis'];
        $width = $row['plotis'];
        $height = $row['aukstis'];
        $numberPlate = $row['numeris'];
        $location = $row['lokacija'];
        $weight = $row['svoris'];
        $tNumber = $row['tnumeris'];
        $state = $row['busena'];

        $posts[] = array('priekabosData' => $date, 'pavadinimas' => $name, 'ilgis' => $length, 'plotis' => $width, 'aukstis' => $height, 'numeris' => $numberPlate, 'lokacija' => $location, 'busena' => $state, 'svoris' => $weight, 'tnumeris' => $tNumber);
    }

    $response['posts'] = $posts;
    $fp = fopen('results.json', 'w');
    fwrite($fp, json_encode($response));
    fclose($fp);
    header("Location: ../results.php?sqlJsonFile=success");
    exit();

}else{
    header("Location: ../results.php?sqlJsonFile=error");
    exit();
}