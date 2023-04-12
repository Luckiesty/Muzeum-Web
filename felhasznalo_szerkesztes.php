<?php
    
    $id = $_GET['id'];
    $nevfris = $_POST['nev'];
    $emailfris= $_POST['email'];



      $kapcsolat = mysqli_connect("localhost", "root", "", "darkbluemoon");
      $lekerdezes2 = mysqli_query($kapcsolat, "UPDATE felhasznalok SET neve='".$nevfris."',email='".$emailfris."' WHERE id=".$id."");
      
      
      header("location: index.php");

?>
