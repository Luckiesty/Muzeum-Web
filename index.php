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
            $_SESSION["statusz"] = $adatok["statusz"];

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
    header("Location: ./index.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
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
</head>
<body>
    
<div data-collapse="medium" data-animation="default" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navigation w-nav">
            <div class="navigation-wrap">
                <a href="/" aria-current="page" class="logo-link w-nav-brand w--current">
                    <img src="kepek/logo.png"  alt="" class="logo-image"/>
                </a>
                <div class="menu">
                    <nav role="navigation" class="navigation-items w-nav-menu">
                        <a href="/about" class="navigation-item w-nav-link">Rólunk</a>
                        <a href="/projects" class="navigation-item w-nav-link">kiállitás</a>
                        <a href="programok.php" class="navigation-item w-nav-link">Programok</a>
                        <a href="/blog" class="navigation-item w-nav-link">Gyűjtemények</a>
                        <a href="/contact" class="navigation-item w-nav-link">Elérhetőségeink</a>
                        <a href="webshop.php" class="navigation-item w-nav-link">Múzeumshop</a>    
                        
                                                 
                      <?php 
                      if(isset($_SESSION['neve']))
                      {
                        print('<form method ="post" >
                        <button type="submit" name="kijelentkezes" >Kilépek</button>
                        </form>');
                        print('<img class="profilkep1 menu-btn>" width="36"  src="'.$_SESSION['profilkep'].'" alt=""> ');
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
      
      <div class="section cc-store-home-wrap">
            <div class="intro-header">
                <div class="intro-content cc-homepage">
                    <div><h1>Tudományos és Csillagászati Muzeum</h1></div>
                    <div class="intro-text"></div>
                    <a href="/about" class="button cc-jumbo-button cc-jumbo-white w-inline-block">
                        <div>tudj meg többet</div>
                    </a>
                </div>
            </div>
            <div class="container">
                
                <div class="divider"></div>
                <div class="home-content-wrap">
                    <div class="w-layout-grid about-grid">
                        <div id="w-node-_86e64837-0616-515b-4568-76c147234d34-2df3ed86">
                            <div class="home-section-wrap">
                                
                                <p class="paragraph-light">Az új Múzeum tudományos céllal és a történelem során az épületek égi vonatkozásaival való összekapcsolása révén a kiállítások és az építészet többet kommunikálnak, mint maga a tudomány:rávilágít arra, hogy mit jelent embernek lenni egy hatalmas és nagyrészt ismeretlen univerzumban.</p>
                            </div>
                        </div>
                        <img src="kepek/muzeumkep2.jpg" id="w-node-_86e64837-0616-515b-4568-76c147234d3f-2df3ed86" alt=""/>
                    </div>
                    <div class="w-layout-grid about-grid cc-about-2">
                        <div id="w-node-_86e64837-0616-515b-4568-76c147234d41-2df3ed86">
                            <div class="home-section-wrap">
                                <p class="paragraph-light">A monumentális új múzeum magával ragadó élményt nyújt, amely valódi csillagászati ​​jelenségekkel közvetlen kapcsolatba hozza a látogatókat. A lépték, a forma és a fény manipulációja révén az épület felhívja a figyelmet a Naphoz és a Föld keringési mozgásához való alapvető kapcsolatunkra. A 420 000 négyzetláb alapterületű Sanghaji Tudományos és Technológiai Múzeum új csillagászati ​​ága a világ legnagyobb múzeuma lesz, amelyet kizárólag a csillagászat tanulmányozására szentelnek.</p>
                            </div>
                        </div>
                        <img src="kepek/telescope.jpg" id="w-node-_86e64837-0616-515b-4568-76c147234d4c-2df3ed86" alt=""/>
                    </div>
                </div>
            </div>
            <div class="container">
                
                <div class="divider"></div>
                <div class="home-content-wrap">
                    <div class="w-layout-grid about-grid">
                        <div id="w-node-_86e64837-0616-515b-4568-76c147234d34-2df3ed86">
                            <div class="home-section-wrap">
                                <p class="paragraph-light">A kiterjedt zöldövezetben elhelyezkedő múzeum területén számos épület és program található, beleértve az ideiglenes és állandó kiállításokat, egy 78 méteres naptávcsövet, egy obszervatóriumot, egy optikai planetáriumot, az Oktatási és Kutatóközpontot és a Digital Sky Theatre-t. A múzeum programozása magával ragadó környezetekkel, űrkutatási tárgyakkal és eszközökkel, valamint oktatási kiállítással várja vendégeit.</p>
                            </div>
                        </div>
                        <img src="kepek/muzeumkep1.jpg" id="w-node-_86e64837-0616-515b-4568-76c147234d3f-2df3ed86" alt=""/>
                    </div>
                    <div class="w-layout-grid about-grid cc-about-2">
                        <div id="w-node-_86e64837-0616-515b-4568-76c147234d41-2df3ed86">
                            <div class="home-section-wrap">
                                <p class="paragraph-light">Miközben a Sanghaji Tudományos és Technológiai Múzeum tudományos és technológiai képességeit emeli, és múzeumként szolgál az egyetemes perspektíva fokozására, a Shanghai Astronomy Museum mérföldkőnek számító struktúrát és polgári központot hoz létre a fejlődő Lingang területen.</p>
                            </div>
                        </div>
                        
                        <video id="w-node-_86e64837-0616-515b-4568-76c147234d4c-2df3ed86" width="700" height="400" controls autoplay>
                        <source src="videok/videoplayback.mp4" type="video/mp4">
                          <source src="movie.ogg" type="video/ogg">
                          Az Ön böngészője nem támogatja a videocímkét.
                      </video>
                    </div>
        </div>      
        </section>
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
                                <div class="title-small">NYITVATARTÁS</div>
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
                <div class="footer-divider"></div>
                <div class="footer-copyright-center"> © 2023 DARK BLUE MOON</div>
            </section>
        



        
        <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=6404dcc77e2407dfb2f3ed83" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://uploads-ssl.webflow.com/6404dcc77e2407dfb2f3ed83/js/webflow.1d3869c5a.js" type="text/javascript"></script>
        <!--[if lte IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->

</script>
    </div>
    
  
                                        
<script src="css/javascript.js"></script>
<script
  src="https://code.jquery.com/jquery-3.6.3.js"></script>

</body>
</html>