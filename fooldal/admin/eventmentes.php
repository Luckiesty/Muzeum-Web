<?php

  $kapcsolat = new mysqli("localhost", "root", "", "darkbluemoon");  

  $nev = $_POST['nev'];
  $idopont = $_POST['idopont'];
  $leiras = $_POST['leiras'];
  $tipus =$_POST['tipus'];
  $ferohely = $_POST['ferohely'];
  $statusz=$_POST['statusz'];
  $name = $_FILES["feltolt"]["name"];

  if(!empty($name)){
    $celmappa="kep/";
   
  $celfajl=$celmappa.basename($name);

  $sikeres=1;
  
  $tipusa=strtolower (pathinfo ($celfajl, PATHINFO_EXTENSION));
  
  $kep =getimagesize($_FILES["feltolt"]["tmp_name"]) ;
  

 
  
  

 

      if ($_FILES["feltolt"]["size"]>2000000) {
          print ("A fájl túl nagy (max: 2Mb lehet)!"); 
          $sikeres=0;
      }
          if ($tipusa!="jpg" && $tipusa!="jpeg" && $tipusa!="bmp" && $tipusa!="png")
          {
              print ("Nem jó képformátum (csak: jpg, jpeg, bmp és png lehet)"); 
              $sikeres=0;
          }
          
          if ($sikeres==0) {

          print("Sikertelen feltöltés. Próbálja újra!");
          }
          
          else{
             if (move_uploaded_file ($_FILES["feltolt"]["tmp_name"], $celfajl)) {

           
              

          $sql ="INSERT INTO events (`event`,`leiras`,`mikor`,`type`,`ferohely`,`statusz`,`kep`) 
          VALUES ('" . $nev . "', '" . $leiras . "', '" .$idopont . "' , 
          '" . $tipus . "', " . $ferohely . ", '" . $statusz . "', '" . $celfajl . "');";
  
  if ($kapcsolat->query($sql) === TRUE) {
     echo "New record created successfully";
   } else {
     echo "Error: " . $sql . "<br>" . $kapcsolat->error;
   }
               print ("Sikeres feltöltés!");
          }else{
          print ("Sikertelen feltöltés!!!");
          }
      }

      $indulo_mappa="kep/";
      $mappa_elemek=scandir($indulo_mappa);
      sort($mappa_elemek);


      $elemszam=count($mappa_elemek);
      header("location: programok.php");
    }else{
      $sql ="INSERT INTO events (`event`,`leiras`,`mikor`,`type`,`ferohely`,`statusz`) 
  VALUES ('" . $nev . "', '" . $leiras . "', '" .$idopont . "' , 
  '" . $tipus . "', " . $ferohely . ", '" . $statusz . "');";
  $result = mysqli_query($kapcsolat,$sql);
  if ($result) {
    header("location: programok.php");
    } 
      

    }
  
  




$kapcsolat->close( );

?>

