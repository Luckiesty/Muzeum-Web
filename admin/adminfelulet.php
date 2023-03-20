<?php
    session_start();
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        <link rel="stylesheet" type="text/css" href="css/admin.css">

<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
    </head>
<body>
    
    <div class="container">
        <div data-collapse="medium" data-animation="default" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navigation w-nav">
                <div class="navigation-wrap">
                    
                    <div class="menu">
                        <nav role="navigation" class="navigation-items w-nav-menu">
                            <a href="adminfelulet.php" class="navigation-item w-nav-link">felhasznalok</a>
                            <a href="felhasznalokeres.php" class="navigation-item w-nav-link">felhasznalo kereses</a>  
                            <a href="jegyek.php" class="navigation-item w-nav-link">jegyfajtak</a>     
                            <a href="programok.php" class="navigation-item w-nav-link">programok</a>                                        
                        </nav>
                    <div class="menu-button w-nav-button">
                        <img src="https://uploads-ssl.webflow.com/6404dcc77e2407dfb2f3ed83/6404dcc77e24072791f3eda8_menu-icon.png" width="22" alt="" class="menu-icon"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="container2" id="tablazat"><?php include('feltablazat.php'); ?> 
        
    <?php
     if(isset($_GET['id']))
     {
        $id = $_GET['id'];
        
        if($id>0)
        {
           
            $lekerdezes2 = $kapcsolat->query("select * from felhasznalok where id=".$id."");
            if($sor = $lekerdezes2->fetch_assoc()){
            print('<div class="szerkesztes2">
            
            <form method="post" id="szek" action="szerkesztes.php?id='.$id.'">
            <h2>Szerkesztés</h2>
                                <label>nev</label>
                                <input type="text" name="nevfris" value="'.$sor['neve'].'" id="nev"><br>
                                <label >email</label>
                                <input type="text" name="emailfris" value="'.$sor['email'].'" id="email"><br>
                                <label >státusz</label>
                                <select id="statusz" name="statuszfris">
                                    <option value="admin">admin</option>
                                    <option value="felhasznalo">felhasznalo</option>
                                </select>
                                <a name="szerkesztes" class="torles" href="torles.php?id='.$id.'">Törlés</a>
                                <button name="feltolt" class="fris" type="submit">mentés</button>
                        </form>
                       
                        </div> ');
            }
      
        }

    }
    
    ?>
 
 </div>

    
    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=6404dcc77e2407dfb2f3ed83" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://uploads-ssl.webflow.com/6404dcc77e2407dfb2f3ed83/js/webflow.1d3869c5a.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
  <script src="js/admin.js"></script>
    <!-- Latest minified bootstrap css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
 <!-- jQuery library -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  
 <!-- Latest minified bootstrap js -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <!-- Button to trigger modal -->

        <!-- Modal -->
<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
          
        </div>
    </div>
</div>

	
        
        <script>
            $('.torles').on('click' ,function(a)
                          {
                              
                              a.preventDefault();
                              Swal.fire({
                                  title: 'Biztos törlöni akarod?', 
                                  text: "Nem fogod tudodni visszaállítani!",
                                  type: 'warning',
                                  icon: 'warning',
                                  showCancelButton: true,
                                  confirmButtonColor: '#3085d6',
                                  cancelButtonColor: '#d33',
                                  confirmButtonText: 'törlés',
                                  }).then((result) => { 
                                      if (result.value) 
                                      {
                                          var $form = $( '#tor' ),
                                          url = $form.attr( "action" );
                                          console.log(url);
                                          // Send the data using post
                                          var posting = $.post( url );
      
                                          posting.done(function( data ) {
                                              location.reload();
                                             
                                          });
                                          
                                        
                                          
                                      }
                                  })
                              });
         
        </script>
<style>

</style>
</body>
</html>