<?php
$kapcsolat = new mysqli("localhost", "root", "", "darkbluemoon");

    ?>
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
        
        <div class="kereses">
        <form class="form-inline" method="post"  id="keres" action="kerestabla.php"> 
        <?php
        $tartalom = "";
        $lekerdezes4 = $kapcsolat->query("select * from jegytipus ");
         while($sor = $lekerdezes4->fetch_assoc()){
         $tartalom .='
         
         <label>'.$sor['nev'].'</label><br><input type="checkbox" id="vehicle3" name="vehicle3" value="">
        ';
        
        }
        print($tartalom);
        ?>
         </form>
         </div> 
        <?php
            $id = $_GET['id'];
            $lekerdezes2 = $kapcsolat->query("select * from events where id=".$id."");
            if($sor = $lekerdezes2->fetch_assoc()){
           $kep = $sor["kep"];
           
        ?>
      
   
       <a href="http://feladat3.loc/admin/programok.php">Vissza</a>
        <div class="flex-container">
        
        <section class="team-slider wf-section">
            <div class="div-block-2">
            
                <div class="team-block">
                    <div>
                    <img src="<?php echo $sor['kep']?>" loading="lazy" alt="" class="team-member-image-two"/>
                    <div class="type"><strong><span class="text2"> <?php echo $sor['type']?></span></strong></div>
                    </div>
                    
                    
                    <div class="team-block-info">
                    <h3 class="team-member-name-two"><?php echo $sor['event']?></h3>
                        <p class="team-member-text"><span class="text"> <?php echo $sor['leiras']?></span></p>
                        <form action="" method="post">
                           <button type="submit" style="background-color:gray;  color:white;"> tudjmegtöbbet..</button>
                        </form>
                       
                        <div>
                        <p class="team-member-text" style=""><b><?php echo $sor['ferohely']?> FŐ</b></p>  <p class="team-member-text" style=""><b><?php echo $sor['mikor']?></b></p>
                        </div>
                        
                        
                            <div class="arrow-embed w-embed">
                               <form action="" method="post">
                                <button type="submit" style="background-color:gray; width:100%; color:white;">Jegyvarsarlas-></button>
                               </form>
                            </div>
                       
                    </div>
                </div>
                
            </div>
        </section>
        <section class="team-slider wf-section">
            <div class="div-block-2">
            
                <div class="team-block">
                    <div>
                    <img src="<?php echo $sor['kep']?>" loading="lazy" alt="" class="team-member-image-two"/>
                    <div class="type"><strong><span class="text2"> <?php echo $sor['type']?></span></strong></div>
                    </div>
                    
                    
                    <div class="team-block-info">
                    <h3 class="team-member-name-two"><?php echo $sor['event']?></h3>
                        <p class="team-member-text"><span class="text"> <?php echo $sor['leiras']?></span></p>
                        <form action="" method="post">
                           <button type="submit" style="background-color:gray;  color:white;"> tudjmegtöbbet..</button>
                        </form>
                       
                        <div>
                        <p class="team-member-text" style=""><b><?php echo $sor['ferohely']?> FŐ</b></p>  <p class="team-member-text" style=""><b><?php echo $sor['mikor']?></b></p>
                        </div>
                        
                        
                            <div class="arrow-embed w-embed">
                               <form action="" method="post">
                                <button type="submit" style="background-color:gray; width:100%; color:white;">Jegyvarsarlas-></button>
                               </form>
                            </div>
                       
                    </div>
                </div>
                
            </div>
        </section>
        <section class="team-slider wf-section">
            <div class="div-block-2">
            
                <div class="team-block">
                    <div>
                    <img src="<?php echo $sor['kep']?>" loading="lazy" alt="" class="team-member-image-two"/>
                    <div class="type"><strong><span class="text2"> <?php echo $sor['type']?></span></strong></div>
                    </div>
                    
                    
                    <div class="team-block-info">
                    <h3 class="team-member-name-two"><?php echo $sor['event']?></h3>
                        <p class="team-member-text"><span class="text"> <?php echo $sor['leiras']?></span></p>
                        <form action="" method="post">
                           <button type="submit" style="background-color:gray;  color:white;"> tudjmegtöbbet..</button>
                        </form>
                       
                        <div>
                        <p class="team-member-text" style=""><b><?php echo $sor['ferohely']?> FŐ</b></p>  <p class="team-member-text" style=""><b><?php echo $sor['mikor']?></b></p>
                        </div>
                        
                        
                            <div class="arrow-embed w-embed">
                               <form action="" method="post">
                                <button type="submit" style="background-color:gray; width:100%; color:white;">Jegyvarsarlas-></button>
                               </form>
                            </div>
                       
                    </div>
                </div>
                
            </div>
        </section>
       

   
       <?php
       }?>
        
                
            


 
       
    </body>
    <style>
        
        .text2
        {
            position: relative;
            bottom: 225px;
            background-color: red;
            color:white ;
            
            left: 5px;
            
        }
        
        .text {
            display: block;
  width: 100%;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
}
        .team-member-name-two{
            position: relative;
            
            color: black;
        }
.team-slider {
    position: relative;
    padding: 80px 30px;
    border-bottom: 1px solid #e4ebf3;
   
}

    .asd{
        position: relative ;
        bottom:  100px;
        z-index: 2;
        color: red;
        color: white;

    }
    .flex-container {
  display: flex;
  flex-wrap: wrap;
  margin: auto;
    width:93%;
background-color: black;


}

.team-member-image-two {
    margin-bottom: 18px;
}
.flex-container > div {
 
  width: 100px;
  margin: 10px;
  text-align: center;
  line-height: 75px;
  font-size: 30px;
}
.div-block-2 {
    width: 400px;
    background-color: #f1f1f1;
    box-shadow: 0 0 5px 5px cornsilk;
    
}

@media screen and (max-width: 991px) {
    .container {
        max-width: 728px;
    }

    .pricing-card-two {
        padding: 24px;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .pricing-image-two {
        margin-right: 20px;
    }

    .container-2 {
        max-width: 728px;
    }

    .team-slide-wrapper {
        width: 47%;
        margin-right: 6%;
    }
}

@media screen and (max-width: 767px) {
    .pricing-items {
        padding: 60px 15px;
    }

    .pricing-card-two {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-pack: start;
        -webkit-justify-content: flex-start;
        -ms-flex-pack: start;
        justify-content: flex-start;
        -webkit-box-align: stretch;
        -webkit-align-items: stretch;
        -ms-flex-align: stretch;
        align-items: stretch;
    }

    .pricing-image-two {
        max-width: 100%;
        margin-right: 0px;
        margin-bottom: 30px;
    }

    .team-slider {
        padding: 60px 15px;
    }
}

@media screen and (max-width: 479px) {
    .container {
        max-width: none;
    }

    .pricing-card-two {
        padding: 15px;
    }

    .pricing-info {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-pack: start;
        -webkit-justify-content: flex-start;
        -ms-flex-pack: start;
        justify-content: flex-start;
        -webkit-box-align: start;
        -webkit-align-items: flex-start;
        -ms-flex-align: start;
        align-items: flex-start;
    }

    .pricing-details {
        margin-bottom: -10px;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-pack: start;
        -webkit-justify-content: flex-start;
        -ms-flex-pack: start;
        justify-content: flex-start;
        -webkit-box-align: start;
        -webkit-align-items: flex-start;
        -ms-flex-align: start;
        align-items: flex-start;
    }

    .pricing-block {
        margin-bottom: 10px;
    }

    .container-2 {
        max-width: none;
    }

    .centered-heading {
        margin-bottom: 24px;
    }

    .team-slide-wrapper {
        width: 100%;
        margin-right: 0%;
    }
}


    </style>
</html>