<?php
   $id = $_GET['id'];

    $nev = $_POST['nev'];
    $idopont = $_POST['idopont'];
    $leiras = $_POST['leiras'];
    $tipus =$_POST['tipus'];
    $ferohely = $_POST['ferohely'];
    $statusz=$_POST['statusz'];
    $name = $_FILES["feltolt"]["name"];
    $type = $_FILES["feltolt"]["type"];
    $size = $_FILES["feltolt"]["size"];

      $kapcsolat = mysqli_connect("localhost", "root", "", "darkbluemoon");
      $sql ="UPDATE events SET event='".$nev."', mikor='".$idopont."', leiras='".$leiras."', 
      type='".$tipus."',ferohely='".$ferohely."' ,statusz='".$statusz."'  WHERE id=".$id."";
      $result = mysqli_query($kapcsolat,$sql);
  if ($result) {
      
    $celmappa="kep/";


   
    $celfajl=$celmappa.basename($name );
    $sikeres=1;
    
    $tipusa=strtolower (pathinfo ($celfajl, PATHINFO_EXTENSION));
    
   
    
    $nev = $_POST["nev"];
   
    

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

                $sql = "UPDATE events  SET kep =('".$celfajl."') WHERE event = '".$nev."'" ;
    if ($kapcsolat->query($sql) === TRUE) {
     } else {
       echo "Error: " . $sql . "<br>" . $kapcsolat->error;
     }
                 print ("Sikeres feltöltés!");
            }else{
            print ("Sikertelen feltöltés!!!");
            }
        }

       
      header("location: programok.php");
    }

?>
