<?php
session_start();

$kapcsolat = new mysqli("localhost", "root", "", "darkbluemoon");
class Login
{
    public mysqli $db_csatlakozas;
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
           echo "<script> alert('Sikertelen Bejentkezés! Próbál újra!'); windows.location='index.php'</script>";
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
     header("Location: http://projectmunka.loc/");
 }
?>
<!DOCTYPE html>
<html data-wf-domain="xraj01s-fantabulous-site.webflow.io" data-wf-page="6404dcc77e2407f8caf3ed97" data-wf-site="6404dcc77e2407dfb2f3ed83">
    <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>drakbluemoon</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        



        <link href="https://uploads-ssl.webflow.com/6404dcc77e2407dfb2f3ed83/css/xraj01s-fantabulous-site.webflow.5f8b7e3d9.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com" rel="preconnect"/>
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous"/>
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
        <script type="text/javascript">
            WebFont.load({
                google: {
                    families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"]
                }
            });
        </script>
        <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif]-->
        <script type="text/javascript">
            !function(o, c) {
                var n = c.documentElement
                  , t = " w-mod-";
                n.className += t + "js",
                ("ontouchstart"in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch")
            }(window, document);
        </script>
        <link href="https://uploads-ssl.webflow.com/img/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
        <link href="https://uploads-ssl.webflow.com/img/webclip.png" rel="apple-touch-icon"/>
        <script type="text/javascript">
            window.__WEBFLOW_CURRENCY_SETTINGS = {
                "currencyCode": "USD",
                "$init": true,
                "symbol": "$",
                "decimal": ".",
                "fractionDigits": 2,
                "group": ",",
                "template": "{{wf {\"path\":\"symbol\",\"type\":\"PlainText\"} }} {{wf {\"path\":\"amount\",\"type\":\"CommercePrice\"} }} {{wf {\"path\":\"currencyCode\",\"type\":\"PlainText\"} }}",
                "hideDecimalForWholeNumbers": false
            };
        </script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
 <!-- jQuery library -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  
 <!-- Latest minified bootstrap js -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <!-- Button to trigger modal -->
        
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div data-collapse="medium" data-animation="default" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navigation w-nav">
            <div class="navigation-wrap">
                <a href="index.php" class="logo-link w-nav-brand">
                <img src="kepek/logo.png"  alt="" class="logo-image"/>
                </a>
                <div class="menu">
                <nav role="navigation" class="navigation-items w-nav-menu">
                    <a href="/about" class="navigation-item w-nav-link">Rólunk</a>
                    <a href="programok.php" class="navigation-item w-nav-link">Programok</a>
                    <a href="/contact" class="navigation-item w-nav-link">Elérhetőségeink</a>    
                    <a href="webshop/webshop.php" class="navigation-item w-nav-link">Webshop</a> 
                        
                        <?php 
                         if(isset($_SESSION['neve']))
                         {
                           
                           print('<a class="w-nav-link" data-toggle="modal"  data-target="#modalForm"  href="#modalForm"><img class="profilkep1"  src="'.$_SESSION['profilkep'].'" alt=""> </a>');
                            
                          
   
                           $sqlkapcsolat2 = $kapcsolat->query("SELECT * FROM felhasznalok WHERE id=". $_SESSION['id'] . " AND statusz='admin'");
                           if($sqlkapcsolat2->num_rows == 1)
                           {
                               print(' <a href="admin/adminfelulet.php" aria-current="page" class="navigation-item w-nav-link">
                               <img src="kepek/adminicon.png" alt="adminicon" style="width:50px;">
                               </a>');
   
                           }
                           print('<form method ="post" >
                           <button type="submit" name="kijelentkezes" class="navigation-item" >Kilépek</button>
                           </form>');
                         }
   
                     ?>                                               
                    </nav>
                    <div class="menu-button w-nav-button">
                        <img src="https://uploads-ssl.webflow.com/6404dcc77e2407dfb2f3ed83/6404dcc77e24072791f3eda8_menu-icon.png" width="22" alt="" class="menu-icon"/>
                    </div>
                </div>
            </div>
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
    ?>
        <div class="section cc-home-wrap">
            <div class="intro-header cc-subpage">
               
                <div class="intro-content">
                
                    <div class="heading-jumbo">
                    
                    Programok<br/>
                    </div>
                </div>
            </div>
        </div>
     <style>
     
     </style>
        <div class="keresesevent">
            <h1>kinek?</h1>
        <form class="form-inline" method="post"  id="keres"  > 
        <?php
        
        $tartalom = "";
        $lekerdezes4 = $kapcsolat->query("select * from jegytipus ");
        $j = 0;
         while($sor = $lekerdezes4->fetch_assoc()){
         $tartalom .='
         
         <label style="display:inline;"> '.$sor['nev'].'</label>
         <input style="margin-right:10px;" type="checkbox" name="nev" class="check" id="kereses'.$j.'" value="'.$sor['nev'].'">
        ';
        $j++;
        }
        print($tartalom);
        ?>
            
       
         </form>
         </div> 
   
    
       <?php

?>

      
       <div class="flex-container">
       <?php include('event_tabla.php'); ?>
  

       </div>
    

        <div class="section">
            <section class="footer-dark wf-section">
                <div class="container-2">
               <h2> MEGKÖZELÍTÉS ÉS KAPCSOLAT</h2>
                <p>Cím: 1146 Budapest, Dózsa György út 41.</p>
                <p>E-mail: drakbluemoon@csillagászat.hu</p>
                <p></p>
                    <div class="footer-wrapper">
                    
                    
                      <div class="footer-content">
                      
                      
                      <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=Budapest, Szépművészeti Múzeum, 1146&t=&z=9&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://2yu.co">2yu</a><br><style>.mapouter{position:relative;text-align:right;height:300px;width:300px;}</style><a href="https://embedgooglemap.2yu.co/">html embed google map</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:100%;width:100%;}</style></div></div>
                            </div>
                      
                      <div class="footer-content">
                            <div id="w-node-_0c357277-1bdf-e79d-fa45-a1fb6d42c0a4-2df3ed86" class="footer-block">
                                <div class="title-small">NYITVATARTÁS:</div>
                                <p class="nyitvatartas-p"> hétfő: zárva</p>
                                <p class="nyitvatartas-p">kedd – vasárnap: 10.00–18.00</p>
                                <p class="nyitvatartas-p"> Pénztárzárás és utolsó belépés: 17.00</p>
                                <p class="nyitvatartas-p">Kiállítások zárása: 17.30-tól.</p>
                                <p class="nyitvatartas-p">Múzeumshop: kedd – vasárnap 10.00–17.30</p>
                                <p class="nyitvatartas-p">Kávézó: kedd – vasárnap 10.00–17.45 (csak belépőjeggyel)</p>
                            </div>
                            <div id="w-node-_0c357277-1bdf-e79d-fa45-a1fb6d42c0ad-2df3ed86" class="footer-block">
                                <a href="/rolunk.php" class="footer-link">múzeumról</a>
                                <a href="/jegyvasarlas.php" class="footer-link">jegyvásárlás</a>
                                <a href="/sajatszoba.php" class="footer-link">sajátszoba</a>
                              
                            </div>
                            <div id="w-node-_0c357277-1bdf-e79d-fa45-a1fb6d42c0b8-2df3ed86" class="footer-block">                     
                                <div class="footer-social-block">
                                <p class="KOVESSEN-MINKET">KÖVESSEN MINKET! </p>
                                    <a href="#" class="footer-social-link w-inline-block">
                                        <img src="https://uploads-ssl.webflow.com/62434fa732124a0fb112aab4/62434fa732124ac15112aad5_twitter%20small.svg" loading="lazy" alt=""/>
                                    </a>
                                    <a href="#" class="footer-social-link w-inline-block">
                                        <img src="https://uploads-ssl.webflow.com/62434fa732124a0fb112aab4/62434fa732124a389912aad8_linkedin%20small.svg" loading="lazy" alt=""/>
                                    </a>
                                    <a href="#" class="footer-social-link w-inline-block">
                                        <img src="https://uploads-ssl.webflow.com/62434fa732124a0fb112aab4/62434fa732124a51bf12aae9_facebook%20small.svg" loading="lazy" alt=""/>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                if(isset($_SESSION['neve']))
                {
                  
                  
                
  $sqlkapcsolat2 = $kapcsolat->query("SELECT * FROM felhasznalok WHERE id=". $_SESSION['id'] ." ");

  
  if($sor = $sqlkapcsolat2->fetch_assoc())
  {
    
  
    
 ?>
 
 <div class="modal fade" id="modalForm" role="dialog">
     <div class="modal-dialog">
         <div class="modal-content">
             <!-- Modal Header -->
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">
                     <span aria-hidden="true">×</span>
                     <span class="sr-only">Close</span>
                 </button>
                 <h4 class="modal-title" id="myModalLabel">Felhasználó szerkesztés</h4>
             </div>
              
             <!-- Modal Body -->
             <div class="modal-body">
                 <div style=" margin: auto; width: 50%;  padding: 10px;"> 
                 <h4><p class="statusMsg"><span id="myspan" style="text-align: center; color:red;" ></span></p></h4>
                 </div>
                
                 <form method="post" action="felhasznalo_szerkesztes.php?id=<?php echo $_SESSION['id'];?>" id="insert_form" enctype="multipart/form-data">
                 
                     <div class="form-group">
                         <label >Név</label>
                         <input type="text" class="form-control input1"  name="nev" id="nev" value="<?php echo $sor['neve'];?>"/>
                     </div>
                     
                     <div class="form-group">
                         <label >Email</label>
                         <input type="text" class="form-control input1"  name="email" id="email" value="<?php echo $sor['email'];?>"/>
                     </div>

 
                       <!-- Modal Footer -->
             <div class="modal-footer">
                 <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
                 <input type="submit" onClick="openModel()"  name="insert" id="insert" value="Insert" class="btn btn-success"/>
             </div>
                 </form>
             </div>
              
           
         </div>
     </div>
 </div>
<?php
  }
}
?>
           
                <div class="footer-divider"></div>
                <div class="footer-copyright-center"> © 2023 DARK BLUE MOON</div>
                <script src="css/javascript.js"></script>
       
    </body>
</html>
<script>

$( ".check" ).change(function() {


    var $form =  $( this ).parent();
     	
    var checkbox = [ ];
    $( $form.find( ".check" ) ).each(function( index ) {
    console.log( index + ": " + $( this ).is(':checked'));
    if($( this ).is(':checked'))
    {
        id = $form.find( ".check" ).val();
        checkbox.push($( this ).val());

    }

    });


    url = "event_tabla.php";
    console.log(id);
    // Send the data using post
    var posting = $.post( url , { checkbox: checkbox} );
    posting.done(function( data) {
        console.log(data);
          $(".flex-container").html(data);
   
    });
});

</script>
<style>
     .intro-header.cc-subpage {
    height: 300px;
    
    background-image: url("kepek/programkep.JFIF");
    color: #fff;
}
</style>