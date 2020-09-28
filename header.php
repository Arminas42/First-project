<?php 

session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light primary-nav">
    
    <ul class="navbar-nav mr-auto">
    <li class=""><a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])== "index.php") {echo "active";} ?>" href="index.php">Pildyti</a></li>
    <li class=""><a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])== "results.php") {echo "active";} ?>" href="results.php">Perziureti</a></li>
    </ul>
    
    <div class="navbar-nav mr-auto">

        

        
        
    </div>
    </nav>
    </header>
</body>
</html>