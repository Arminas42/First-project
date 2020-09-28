<?php
require 'dbh.inc.php';
$sql = "SELECT * FROM priekabos;";
$result = mysqli_query($conn, $sql);