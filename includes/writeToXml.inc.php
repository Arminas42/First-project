<?php
    require 'dbh.inc.php';
    $sql = "SELECT priekabosData, pavadinimas, ilgis, plotis, aukstis, numeris, lokacija, svoris, tnumeris FROM priekabos;";
    $priekabosArray = array();

    if($result = mysqli_query($conn, $sql)){
        while($row = mysqli_fetch_assoc($result)){
            array_push($priekabosArray, $row);
        }
        if(count($priekabosArray)){
            createXMLfile($priekabosArray);
        }
    }
    mysqli_close($conn);
    header("Location: ../results.php?sqlXMLFile=success");
    exit();

    function createXMLfile($priekabosArray){
        $filePath = 'priekabos.xml';
        $dom = new DOMDocument('1.0', 'utf-8');
        $root = $dom-> createElement('priekabos');
        for($i=0; $i<count($priekabosArray); $i++){
            
            $priekabaTnumeris =$priekabosArray[$i]['tnumeris'];
            $priekabaData = $priekabosArray[$i]['priekabosData'];
            $priekabaPavadinimas = $priekabosArray[$i]['pavadinimas'];
            $priekabaIlgis = $priekabosArray[$i]['ilgis'];
            $priekabaPlotis = $priekabosArray[$i]['plotis'];
            $priekabaAukstis = $priekabosArray[$i]['aukstis'];
            $priekabaNumeris = $priekabosArray[$i]['numeris'];
            $priekabaLokacija = $priekabosArray[$i]['lokacija'];
            $priekabaSvoris = $priekabosArray[$i]['svoris'];

            $priekaba = $dom->createElement('priekaba');
            $priekaba -> setAttribute('tabuliacijosNumeris',$priekabaTnumeris);

            $Data = $dom-> createElement('data',$priekabaData);
            $priekaba ->appendChild($Data);

            $pavadinimas = $dom-> createElement('pavadinimas',$priekabaPavadinimas);
            $priekaba ->appendChild($pavadinimas);

            $ilgis = $dom-> createElement('ilgis',$priekabaIlgis);
            $priekaba ->appendChild($ilgis);

            $plotis = $dom-> createElement('plotis',$priekabaPlotis);
            $priekaba -> appendChild($plotis);

            $aukstis = $dom-> createElement('aukstis',$priekabaAukstis);
            $priekaba -> appendChild($aukstis);

            $numeris = $dom-> createElement('numeris',$priekabaNumeris);
            $priekaba -> appendChild($numeris);

            $lokacija = $dom->createElement('lokacija',$priekabaLokacija);
            $priekaba -> appendChild($lokacija);

            $svoris = $dom->createElement('svoris',$priekabaSvoris);
            $priekaba ->appendChild($svoris);

            $root -> appendChild($priekaba);

        }
        $dom->appendChild($root); 
        $dom->save($filePath); 
    }