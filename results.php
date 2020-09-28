<?php
require 'header.php';
require 'includes/read.inc.php';

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
    </style>
</head>
<body>
    <?php
    if(isset($_SESSION['message'])):
    ?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>"> 
        <?php
            echo $_SESSION['message'];
            unset ($_SESSION['message']);
        ?>
    </div>
    <?php endif ?>
    <div class="float-right p-1">
        
        <input id="input" type="text" name="input" placeholder= "Ieškoti...">
        <button onclick="hideElement()" type="submit" name="search-button" id="searchBtn" class="btn btn-outline-secondary">Ieškoti &#x1F50D</button>
        
    </div>
    <div class="float-right p-1">
        <a href="includes/writeToJson.inc.php" class="btn btn-warning">Išsaugoti duomenų bazę Json faile</a>
        
    </div>
    <div class="float-right p-1">
        <a href="includes/writeToXml.inc.php" class="btn btn-warning">Išsaugoti duomenų bazę Xml faile</a>
        
    </div>
    <div class="float-right p-1">
        <a href="includes/priekabos.xml" class="btn btn-success">XML failas</a>
        
    </div>
    <div class="search" id="searchTable">
        
    </div>
    <table class="table" id="resultTable">
        <thead>
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
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): 
            
        ?>
            <tr>
                <td><?php echo $row['priekabosData']; ?></td>
                <td><?php echo $row['pavadinimas']; ?></td>
                <td><?php echo $row['ilgis']; ?></td>
                <td><?php echo $row['plotis']; ?></td>
                <td><?php echo $row['aukstis']; ?></td>
                <td><?php echo $row['numeris']; ?></td>
                <td><?php echo $row['lokacija']; ?></td>
                <td><?php if($row['busena'] ==1){echo "Yra";}else{echo "nera";}  ?></td>
                <td><?php echo $row['svoris']; ?></td>
                <td><?php echo $row['tnumeris']; ?></td>
                <td>
                <a href="includes/edit.inc.php?edit=<?php echo $row['tnumeris']; ?>" class="btn btn-info">
                Edit
                
                </a>
                <a href="includes/delete.inc.php?delete=<?php echo $row['tnumeris']; ?>" class="btn btn-danger">
                Delete
                
                </a>
                </td>
            </tr>
        <?php endwhile; ?>
            
        </tbody>
    </table>
    <?php 
   
    mysqli_free_result($result);
    mysqli_close($conn);
    ?>
</body>
<script>
    function hideElement(){
        var x = document.getElementById("resultTable");
        x.style.display = "none";
    }
    
    var y = document.getElementById("searchTable");
    
    
    var btn = document.getElementById("searchBtn");
    
    btn.addEventListener('click',function(e){
        console.log("woow");
        var ajax = new XMLHttpRequest();
        var searchField = document.getElementById("input").value;
        var url = "includes/search.inc.php";
        var vars = "input="+searchField;
        ajax.open("POST", url, true);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.onreadystatechange = function() {
                if(ajax.readyState == 4 && ajax.status == 200){
                    y.innerHTML = ajax.responseText;
                    
                }
            }
        ajax.send(vars);
        
       
        
    });
        
    
</script>
</html>