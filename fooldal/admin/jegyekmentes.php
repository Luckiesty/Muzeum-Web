<?php

  $kapcsolat = new mysqli("localhost", "root", "", "darkbluemoon");  
  if( !empty($_POST['nev']) && !empty($_POST['tipus'])  && !empty($_POST['ar'])){

    $nev = $_POST['nev'];
  $tipus = $_POST['tipus'];
  $ar = $_POST['ar'];
  
    $sql ="INSERT INTO jegytipus (`nev`,`tipus`,`ar` ) VALUES ('" . $nev . "', '" . $tipus . "', '" .$ar . "');";
    $result = mysqli_query($kapcsolat,$sql);
  if ($result) {
      echo "Employee has been sucessfully updated.";
      header("location: jegyek.php");
    } else {
      return "Error: " . $sql . "<br>" . $kapcsolat->error;
    }


}

$kapcsolat->close( );

?>
