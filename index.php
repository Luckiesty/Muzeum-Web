<?php
session_start();
class Login
{
    public $db_csatlakozas;
    function __construct()
    {
        $this->db_csatlakozas = new mysqli("localhost", "root", "", "darkbluemoon");
    }

    function Bejelentkezes($nev, $jelszo)
    {
        $tabla_lekeres = $this->db_csatlakozas->query("SELECT * FROM felhasznalok WHERE neve = '" . $nev . "' AND jelszava = '".md5($jelszo) . "'");
        if ($adatok = $tabla_lekeres->fetch_assoc()) {
            $_SESSION["neve"] = $adatok["neve"];
            $_SESSION["id"] = $adatok["id"];
            $_SESSION["profilkep"] = $adatok["profilkep"];
            header("Location: ./home.php");
        } else {
           echo "Sikertelen Bejentkezés! Próbál újra!";
        }
    }
    
    function BeVanEJelentkezve()
    {
        if (isset($_SESSION["neve"])) 
        {
            return true;
        } else 
        {
            return false;
        }
    }
    
}
$peldanyositas_bejel = new Login();
if (isset($_POST["neve"]) && isset($_POST["jelszava"])) {
    $peldanyositas_bejel->Bejelentkezes($_POST["neve"], $_POST["jelszava"]);
}

if (isset($_POST["kijelentkezes"])) {
   session_unset(); 
    session_destroy();
    header("Location: ./index.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DARKBLUEMOON</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
    
<header class="continer-fluid ">
            <div class="header-bottom">
                <div class="container">
                    <div class="row nav-row">
                        <div class="col-md-3">
                            <img class="fologo" src="kepek/fologo.png" alt="">
                        </div>
                        <div class="col-md-9 nav-col">
                            <nav class="navbar navbar-expand-lg navbar-light">

                              
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav">
                                        <li>
                                            <a class="nav-link" href="index.php">Főoldal</a>
                                        </li>
                                        <li >
                                            <a class="nav-link" href="Rolunk.php">Rolunk</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="kategoriak.php">Kategóriák</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="videok.php">Videók</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="elorhetosegeink.php">Elérhetőségeink</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="webshop.php">Souvenir</a>
                                        </li>
                                    
                                    </ul>
                                    
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header> 
</div>




<?php 
   
if (!isset($_SESSION["neve"])) {
    ?>
    <button class="open-button" onclick="openForm()">bejelentkezés</button>

        <div class="form-popup" id="myForm">
                <form method='post' class="form-container">
                <h1>bejelentkezés</h1>

                <label for="email"><b>név</b></label>
                <input type="text" placeholder="név" name="neve" required>

                <label for="psw"><b>jelszó</b></label>
                <input type="password" placeholder="jelszó" name="jelszava" required>
                <a href="regist.php">Regisztráció</a>
                <br>
                                            
            <button type="submit" class="btn">Belép</button>               
            <button type="button" class="btn cancel" onclick="closeForm()">Bezárás</button>
        </form>
    </div>
    <?php
     
        }    
              
        
        else
        {  
            
                                   
    ?>
    <div id="profil-keret">
        <?php
        $profilkep = $_SESSION['profilkep'];
        print('<img src="'.$profilkep.'" alt="">');
   
    	
        ?>
       <img src="" alt="">

    </div>
    
    <form method ='post' >
        <button type="submit" name="kijelentkezes" >Kilépt</button>
        </form>
        <?php
        }
        ?>
                                        
<script src="css/javascript.js"></script>
<script
  src="https://code.jquery.com/jquery-3.6.3.js"></script>

</body>
</html>