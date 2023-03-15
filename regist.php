<?php
class Regisztracio
{
    public mysqli $db_csatlakozas;
    function __construct()
    {
        $this->db_csatlakozas = new mysqli("localhost", "root","", "darkbluemoon");
    }
    function Regisztracio($felhasznalonev, $jelszo, $jelszo_ujra)
    {
        $felhasznalo_adas= $this->db_csatlakozas->query("SELECT * FROM felhasznalok WHERE neve = '" . $felhasznalonev . "'");
        if ($adatok = $felhasznalo_adas->fetch_assoc()) {
            echo "<script> alert('Ez egy regisztrált felhasználónév.'); windows.location='regist.php'</script>";
        }
         else
                if ($jelszo === $jelszo_ujra) { {
                    $jelszo = md5($jelszo);
                    
                            $this->db_csatlakozas->query("INSERT INTO felhasznalok (`neve`, `jelszava`) VALUES ('" . $felhasznalonev . "', '" . $jelszo . "');");
                header("Location: ./index.php");
            }
        }
        if (empty($felhasznalonev) && empty($jelszo) && empty($jelszo_ujra)) {
            echo "<script> alert('Töltse ki az összes fület.'); windows.location='regist.php'</script>";
            
        }
    }
}

$peldanyositas_regisztracio = new Regisztracio();
if (isset($_POST["neve"]) && isset($_POST["jelszava"]) && isset($_POST["jelszoujra"]) ) {
    $peldanyositas_regisztracio->Regisztracio($_POST["neve"], $_POST["jelszava"], $_POST["jelszoujra"]);
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
        <div class="mb-3">
                <label>Felhasználónév:</label>
                
                <br>
                <input  class="form-control" type="text" name="neve"></input>
                </div>
                <br>
            <div class="mb-3">
                <label>Jelszó:</label>
                <br>
                <input  class="form-control" type="password" name="jelszava"></input>
            </div>
                <br>
            <div class="mb-3">
                <label>Jelszó újra:</label>
                <br>
                <input  class="form-control" type="password" name="jelszoujra"></input><br>
                <br>
            </div>
            <div class="mb-3">
                 <input  class="form-control" type="file" name="feltolt" id="feltolt">
                <br> 
                <br>
                <input class="btn btn-primary" type="submit" value="Regisztrálok" name="submit" >
            </div>
            <a href="index.php">mégsem</a>  
    
        </form>
        
        </div> 
        
    <?php

if(isset($_POST["submit"])) 
{ $celmappa="D:/PHP/Muzeum-Web/registracio-kep/";


    $kapcsolat = new mysqli("localhost", "root", "", "darkbluemoon");
    $lekerdezes = $kapcsolat->query("SELECT * from felhasznalok");
    $celfajl=$celmappa.basename($_FILES["feltolt"]["name"]);
    $sikeres=1;
    
    $tipusa=strtolower (pathinfo ($celfajl, PATHINFO_EXTENSION));
    
    $kep =getimagesize($_FILES["feltolt"]["tmp_name"]) ;
    
    $nev = $_POST["neve"];
   
    if ($kep != false) 
    {
        print("A feltöltött fájl kép.");

        
    }
    else
    {
    
    print("A feltöltött fájl nem kép."); 
    $sikeres=0;
    }

    if (file_exists ($celfajl)){
        print("A fájl már létezik, töltöltsen másik képet.");
        $sikeres=0;
        }

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
                $keplista = explode("/", $celfajl);
                end($keplista);
                $fajlnev = $keplista[key($keplista)]; 
                $sql = ("UPDATE felhasznalok  SET profilkep =('".$fajlnev."') WHERE neve = '".$nev."'");
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

        $indulo_mappa="D:/PHP/Muzeum-Web/registracio-kep/";
        $mappa_elemek=scandir($indulo_mappa);
        sort($mappa_elemek);


        $elemszam=count($mappa_elemek);


print("<table border='2' ");
for($i=0;$i<$elemszam;$i++)
{
    if(substr($mappa_elemek[$i],0,1)!="." && $mappa_elemek[$i]!=".." && filetype($indulo_mappa.$mappa_elemek[$i])!="dir")
    { 
    
    // $fneve= $indulo_mappa.$mappa_elemek[$i];
     
    
    
    // print('<br><td><img class="kep" src="'.$fneve.'" "></td>');

       }

}
print("</table>");


}
print("<table border='2' ");
$kapcsolat = new mysqli("localhost", "root", "", "darkbluemon");
$lekerdezes = $kapcsolat->query("select * from felhasznalok");
    $tartalom = "";
    while($sor = $lekerdezes->fetch_assoc()){
        
        $tartalom .= "<br><td><img class='kep' src=\"". $sor['profilkep'] ."\" alt=\"\" /></td>";
       
        
    }
    print("</table>");

    print $tartalom;
    

?>



</body>


</html>