<?php

  $kapcsolat = new mysqli("localhost", "root", "", "darkbluemoon");  
    $nev = $_POST['nev'];
  $tipus = $_POST['tipus'];
  $ar = $_POST['ar'];
  
    $sql ="INSERT INTO jegytipus (`nev`,`tipus`,`ar` ) VALUES ('" . $nev . "', '" . $tipus . "', '" .$ar . "');";
    $result = mysqli_query($kapcsolat,$sql);

$kapcsolat->close( );

?>
