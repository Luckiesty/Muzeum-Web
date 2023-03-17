<?php
<<<<<<< HEAD
=======

>>>>>>> 32ff1c5bf554a6bd9aaabc5bdabb53fa977462d4
    session_start();
    $id = $_GET['id'];
    $nevfris = $_POST['nevfris'];
    $emailfris= $_POST['emailfris'];
    $statuszfris = $_POST['statuszfris'];


      $kapcsolat = mysqli_connect("localhost", "root", "", "darkbluemoon");
      $lekerdezes2 = mysqli_query($kapcsolat, "UPDATE felhasznalok SET neve='".$nevfris."',email='".$emailfris."',statusz='".$statuszfris."'WHERE id=".$id."");

      header("location: feltablazat.php");
?>