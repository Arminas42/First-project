<?php
require 'dbh.inc.php';
$search = '%'.$_POST['input'].'%';
$searchSql = "SELECT * FROM priekabos WHERE priekabosData LIKE ? OR pavadinimas LIKE ? OR ilgis LIKE ? OR plotis LIKE ? OR aukstis LIKE ? OR numeris LIKE ? OR lokacija LIKE ? OR busena LIKE ? OR svoris LIKE ? OR tnumeris LIKE ?;";

$output = '';
$busena = "yra";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt,$searchSql);
mysqli_stmt_bind_param($stmt, "ssssssssss", $search, $search, $search, $search, $search, $search, $search, $search, $search, $search);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

 if (mysqli_num_rows($result)>0){
    $output .= '<table class="table"><thead>
    <tr>
        <th scope="col">Priekabos data</th>
        <th scope="col">Pavadinimas</th>
        <th scope="col">Ilgis</th>
        <th scope="col">Plotis</th>
        <th scope="col">Aukštis</th>
        <th scope="col">Numeris</th>
        <th scope="col">Lokacija</th>
        <th scope="col">Būsena</th>
        <th scope="col">Svoris</th>
        <th scope="col">Tabuliacijos numeris</th>
        <th scope="col">Veiksmas</th>
    </tr>
    </thead>
    <tbody>';

    while ($row = mysqli_fetch_assoc($result))
    {
        if($row['busena'] ==1){$busena="Yra";}else{$busena="nera";}
        $output .= '<tr>
        <td>'.$row['priekabosData'].'</td>
        <td>'.$row['pavadinimas'].'</td>
        <td>'.$row['ilgis'].'</td>
        <td>'.$row['plotis'].'</td>
        <td>'.$row['aukstis'].'</td>
        <td>'.$row['numeris'].'</td>
        <td>'.$row['lokacija'].'</td>
        <td>'.$busena.'</td>
        <td>'.$row['svoris'].'</td>
        <td>'.$row['tnumeris'].'</td>
        <td>
        <a href="includes/edit.inc.php?edit='.$row['tnumeris'].'" class="btn btn-info">
        Edit
        </a>
        <a href="includes/delete.inc.php?delete='.$row['tnumeris'].'" class="btn btn-danger">
        Delete
        </a>
        </td>
        </tr>';
    }
    $output .='</tbody></table>';
 }


echo $output;
exit();