<?php
    require 'header.php';
    $name = "";
    $number = "";
    $city = "";
    $weight = "";
    $length = "";
    $width = "";
    $height = "";
    $tabNumber="";
    $update = false;
    if (isset($_SESSION['update'])){$update = true;}
    $invalid = array("name"=>"false","number"=>"false","city"=>"false","weight"=>"false","length"=>"false","width"=>"false","height"=>"false","tabNumber"=>"false");
    if (isset($_SESSION['transferValues'])){
    $tabNumber = $_SESSION['tNumber'];
    $name = $_SESSION['name'];
    $weight = $_SESSION['weight'];
    $length = $_SESSION['length'];
    $width = $_SESSION['width'];
    $height =  $_SESSION['height'];
    $number = $_SESSION['numberPlate'];
    $city = $_SESSION['city'];
    if(isset($_SESSION['nameError'])){$invalid['name']="true";}
    if(isset($_SESSION['numberPlateError'])){$invalid['number']="true";}
    if(isset($_SESSION['weightError'])){$invalid['weight']="true";}
    if(isset($_SESSION['lengthError'])){$invalid['length']="true";}
    if(isset($_SESSION['heightError'])){$invalid['height']="true";}
    if(isset($_SESSION['widthError'])){$invalid['width']="true";}
    if(isset($_SESSION['tNumberError'])){$invalid['tabNumber']="true";}
    }
        session_unset();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <form action="includes/insert.inc.php" method="POST">
        <div class="form-group">
            <label for="date">Priekabos data</label>
            <input id="date" class="form-control " type="date" placeholder="Priekabos data" name="data" value="<?php echo $date ?>">
        </div>
        <div class="form-group">
            <label for="nameof">Priekabos pavadinimas</label>
            <input id="nameof" class="form-control <?php if($invalid['name']=="true"){echo "is-invalid";}?>" type="text" placeholder="Priekabos pavadinimas" name="pavadinimas" value="<?php echo $name ?>">
        </div>
        <div class="form-group">
            <label for="length">Priekabos ilgis</label>
            <input  id="length" class="form-control <?php  if($invalid['length']=="true"){echo "is-invalid";}?>" type="text" placeholder="Priekabos ilgis" name="ilgis" value="<?php echo $length ?>">
        </div>
        <div class="form-group">
            <label for="width">Priekabos plotis</label>
            <input id="width" class="form-control <?php  if($invalid['width']=="true"){echo "is-invalid";}?>" type="text" placeholder="Priekabos plotis" name="plotis" value="<?php echo $width ?>">
        </div>
        <div class="form-group">
            <label for="height">Priekabos aukstis</label>
            <input id="height" class="form-control <?php  if($invalid['height']=="true"){echo "is-invalid";}?>" type="text" placeholder="Priekabos aukstis" name="aukstis" value="<?php echo $height ?>">
        </div>
        <div class="form-group">
            <label for="numberplate">Priekabos numeris</label>
            <input id="numberplate" class="form-control <?php  if($invalid['number']=="true"){echo "is-invalid";}?>" type="text" placeholder="Priekabos numeris" name="numeris" value="<?php echo $number ?>">
        </div>
        <div class="form-group">
            <label for="location">Pasirinkite miesta</label>
            <select class="form-control" name="lokacija" id="location">
                <?php if($city=="" || $city == "Panevezys"): ?>
                <option <?php echo "selected"?> value="Panevezys">Panevezys</option>
                <option value="Siauliai" >Siauliai</option>
                <option value="Kedainiai">Kedainiai</option>
                <?php elseif($city == "Siauliai"):?> 
                <option value="Panevezys">Panevezys</option>
                <option <?php echo "selected"?> value="Siauliai" >Siauliai</option>
                <option value="Kedainiai">Kedainiai</option>
                <?php elseif($city == "Kedainiai"):?> 
                <option value="Panevezys">Panevezys</option>
                <option value="Siauliai" >Siauliai</option>
                <option <?php echo "selected"?> value="Kedainiai">Kedainiai</option>
                <?php endif; ?>
            </select>
        </div>  
        <div class="form-group ">
            <label for="weight">Priekabos svoris</label>
            <input id="weight" class="form-control <?php  if($invalid['weight']=="true"){echo "is-invalid";}?>" type="text" step="any" placeholder="Priekabos svoris" name="svoris" value="<?php echo $weight ?>">
        </div>
        <div class="form-group">
            <label for="tabnumber">Priekabos tabuliacijos numeris</label>
            <input id="tabnumber" class="form-control <?php  if($invalid['tabNumber']=="true"){echo "is-invalid";}?>" type="text" placeholder="Priekabos identifikacija" name="identifikacija" value="<?php echo $tabNumber ?>">
        </div>
        <?php if($update == false): ?>
        <?php echo '<button type="submit" class="btn btn-primary" name="pateikti">Pateikti</button>';?>
        <?php elseif($update == true): ?>
        <?php echo '<button type="submit" class="btn btn-info" name="taisyti">Taisyti</button>'; ?>
        <?php endif; ?>
        
        
    </form>
    
</body>
<script>
    var tabnumber = document.getElementById('tabnumber');
    
    tabnumber.addEventListener("input", function(){
        var ajax = new XMLHttpRequest();
        var tabnumberValue = document.getElementById('tabnumber').value;
        var url = "includes/searchTnumber.inc.php";
        var vars = "value="+tabnumberValue;
        ajax.open("POST", url, true);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.onreadystatechange = function() {
                if(ajax.readyState == 4 && ajax.status == 200){
                    if(ajax.responseText == "True"){
                        tabnumber.style.borderColor = "red";
                    }else{
                        tabnumber.style.borderColor = "green";
                    }
                    
                }
            }
        ajax.send(vars);
        
    });
</script>
</html>