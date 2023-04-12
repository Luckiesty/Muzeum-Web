<?php

class Regisztracio
{
    public mysqli $db_csatlakozas;
    function __construct()
    {
        $this->db_csatlakozas = new mysqli("localhost", "root","", "darkbluemoon");
    }
    function Regisztracio($felhasznalonev,$email, $jelszo, $jelszo_ujra, $kepnev)
    {


        $felhasznalo_adas= $this->db_csatlakozas->query("SELECT * FROM felhasznalok WHERE neve = '" . $felhasznalonev . "'");

    
      
            if ($adatok = $felhasznalo_adas->fetch_assoc()) {
                echo "<script> alert('Ez egy regisztrált felhasználónév vagy email.');</script>";
            }else{
                if ($jelszo === $jelszo_ujra) { 
                        
                    $jelszo = md5($jelszo);

                    $this->db_csatlakozas->query("INSERT INTO felhasznalok (`neve`, `jelszava`,email, profilkep) 
                    VALUES ('" . $felhasznalonev . "', '" . $jelszo . "', '" . $email. "', '".$kepnev."');");
                   
                    header("Location: ./index.php");
                
            }
            }
        }

    }

?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Regisztráció</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    
</head>

<body>
    
    <div class="d-flex justify-content-center align-items-center vh-100">
        <form class="shadow w-450 p-3" id="registkeret"  method="post" enctype="multipart/form-data" >
        <h1>Regisztráció</h1>
        <span id="myspan"></span>
        <div class="mb-3">
                <label>Felhasználónév:</label>
                
                <br>
                <input  class="form-control" type="text" id="neve" name="neve"></input>
                </div>
                <br>
                <div class="mb-3">
                <label>email</label>
                <br>
                <input  class="form-control input1" type="email" id="email" name="email"></input>
                </div>
            <div class="mb-3">
                <label>Jelszó:</label>
                <br>
                <input  class="form-control input1" type="password" id="jelszo" name="jelszava"></input>
            </div>
                <br>
            <div class="mb-3">
                <label>Jelszó újra:</label>
                <br>
                <input  class="form-control input1"  type="password" id="jelszoujra" name="jelszoujra"></input><br>
                <br>
            </div>
            <div class="mb-3">
                 <input  class="form-control" type="file" name="feltolt" id="feltolt">
                <br> 
                <br>
                <input class="btn btn-primary" type="submit" value="Regisztrálok" id="regist" name="regist" >
            </div>
            <a href="index.php">mégsem</a>  
    
        </form>
        
        </div> 
    </div>
        
    <?php
    
if(isset($_POST["neve"])) 
{ 
    
    $celmappa="profilkepek/";
    $celfajl=$celmappa.$_FILES["feltolt"]["name"]; 
    
    if ($_FILES['feltolt']['error'] !== UPLOAD_ERR_OK)
    {
        $celfajl2 ="profilkepek/alapkep.jpg";
        $peldanyositas_regisztracio = new Regisztracio();
                if (isset($_POST["neve"]) && isset($_POST["email"]) && isset($_POST["jelszava"]) && isset($_POST["jelszoujra"]) ) {
                    $peldanyositas_regisztracio->Regisztracio($_POST["neve"], $_POST["email"], $_POST["jelszava"], $_POST["jelszoujra"], $celfajl2);
                }
                else {
                    echo "Error: " . $sql . "<br>" . $kapcsolat->error;
                }

     
    }
    else
    {           
       
        $sikeres=1;
        
        $tipusa=strtolower (pathinfo ($celfajl, PATHINFO_EXTENSION));
        
       
        
        $nev = $_POST["neve"];
    
    
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
                $peldanyositas_regisztracio = new Regisztracio();
                if (isset($_POST["neve"]) && isset($_POST["email"]) && isset($_POST["jelszava"]) && isset($_POST["jelszoujra"]) ) {
                    $peldanyositas_regisztracio->Regisztracio($_POST["neve"], $_POST["email"], $_POST["jelszava"], $_POST["jelszoujra"], $celfajl);
                    echo "New record created successfully";
                }
                else {
                    echo "Error: " . $sql . "<br>" . $kapcsolat->error;
                }
               } 
            }
    }
   
}




?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=6404dcc77e2407dfb2f3ed83" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://uploads-ssl.webflow.com/6404dcc77e2407dfb2f3ed83/js/webflow.1d3869c5a.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
  <script src="js/admin.js"></script>
<script>
     $("#regist").on('click', function() {
  
  
  event.preventDefault();
  var nev = $('#neve').val();
  var email = $('#email').val();
  var jelszo = $('#jelszo').val();
  var jelszoujra = $('#jelszoujra').val();
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  $('.input1').css("border-color", "#ccc");

 var a = 0;
 
if($('#neve').val() == "")  
{  
  
  $('#neve').css("border-color", "red");
  var a = 1;
}
if(($('#email').val() == ""))
{  
 
  $('#email').css("background-color", "#d29a9a");

  var a = 1;
}
if((!regex.test(email)))
{  
 
  $('#email').css("background-color", "#d29a9a");
  document.getElementById("myspan").innerHTML="Nem megfelelő email!";
 var a =2;
}
if($('#jelszo').val() == '')  
{  
  
  $('#jelszo').css("border-color", "red");
  var a = 1;
}  
if($('#jelszoujra').val() == '')
{  
 
  $('#jelszoujra').css("border-color", "red");
  var a = 1;
}
 if($('#jelszoujra').val() != $('#jelszo').val() )
{  
 
  $('#jelszoujra').css("border-color", "red");
  $('#jelszo').css("border-color", "red");
  document.getElementById("myspan").innerHTML="Nem egyező jelszó!";

}


else if (a ==0)
{$("#registkeret").submit();}

if (a==1)
{  
  document.getElementById("myspan").innerHTML="Minden mező megfelelő kitöltése kötelező";
  console.log(nev);
  console.log(email);
  console.log(jelszo);
  console.log(jelszoujra);
console.log(a);
}



});
</script>

</body>


</html>