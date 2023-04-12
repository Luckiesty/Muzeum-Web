<?php
    
    $id = $_GET['id'];
    $nev = $_POST['nev'];
    $tipus= $_POST['tipus'];
    $ar = $_POST['ar'];


      $kapcsolat = mysqli_connect("localhost", "root", "", "darkbluemoon");
      $lekerdezes2 = mysqli_query($kapcsolat, "UPDATE jegytipus SET nev='".$nev."',tipus='".$tipus."',ar='".$ar."'WHERE jegy_id=".$id."");
      
      
      header("location: jegyek.php");

?>
