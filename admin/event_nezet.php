<?php
session_start();
error_reporting(0);
$kapcsolat = new mysqli("localhost", "root", "", "darkbluemoon");
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
        <link rel="stylesheet" type="text/css" href="css/admin.css">



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
    </head>
    <body>
        
        <div class="section cc-home-wrap">
            <div class="intro-header cc-subpage">
                <div class="intro-content">
                    <div class="heading-jumbo">
                    Programok<br/>
                    </div>
                </div>
            </div>
        </div>
        <h1><a href="programok.php" class="navigation-item w-nav-link">Vissza</a> </h1>
        <div class="keresesevent">
            <h1>kinek?</h1>
        <form class="form-inline" method="post"  id="keres" > 
        
        <?php
        
        $tartalom = "";
        $lekerdezes4 = $kapcsolat->query("select * from jegytipus ");
         while($sor = $lekerdezes4->fetch_assoc()){
         $tartalom .='
         
         <label style="display:inline;"> '.$sor['nev'].'</label>
         <input style="margin-right:10px;" type="checkbox" name="nev" id="kereses2" value="'.$sor['nev'].'">
        ';
        
        }
        print($tartalom);
        ?>
          
       
         </form>
         </div> 
   
    
       <?php



$nev = $_POST['nev'];

 $lekerdezes = $kapcsolat->query("select * from events WHERE type  like '".$nev."%' ");

?>
      
       <div class="flex-container">
 <?php 
 $tartalom = "";
            while($sor = $lekerdezes->fetch_assoc()){
                $tartalom .='
                <section class="team-slider wf-section">
            <div class="div-block-2">
            
                <div class="team-block">
                    <div class="top">
                    <img src="'.$sor['kep'].'" loading="lazy" alt="" class="team-member-image-two"/>
                    <div class="type"><strong><span class="text2">  '.$sor['type'].'</span></strong></div>
                    <div class="nev"><h3 >'.$sor['event'].'</h3></div>
                    </div>
                    
                    
                    <div class="team-block-info">
                   
                        <p class="team-member-text"><span class="text">'.  $sor['leiras'].'</span></p>
                        <form action="" method="post">
                           <button type="submit" style="background-color:gray;  color:white;"> tudjmegtöbbet..</button>
                        </form>
                       
                        <div>
                        <p class="team-member-text" style=""><b>'.$sor['ferohely'].' FÕ</b></p>  <p class="team-member-text" style=""><b>'.$sor['mikor'].'</b></p>
                        </div>
                        
                        
                            <div class="arrow-embed w-embed">
                               <form action="" method="post">
                                <button type="submit" style="background-color:gray; width:100%; color:white;">Jegyvarsarlas-></button>
                               </form>
                            </div>
                       
                    </div>
                </div>
                
            </div>
        </section>';
                 
            }
            print($tartalom);
        

?>
            
       
    </body>
</html>
<style>
    .intro-header.cc-subpage {
  height: 340px;
  background-color: #000;
  background-image: none;
  color: #fff;
}
</style>
