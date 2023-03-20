<?php
    session_start();
  
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
       
        <link rel="stylesheet" type="text/css" href="css/admin.css">
        
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

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
    <div class="container2"  id="tablazat">
  
       <div class="eventplus"  id="tablazat">
    <button  class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm">
          +eventletrehozzas
      </button>  

      </div>
<?php include('eventtabla.php'); ?>
</div>

    <?php
   
    ?>
   
    
<!-- Latest minified bootstrap css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
 
<!-- Latest minified bootstrap js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Button to trigger modal -->

 
<!-- Modal -->
<div class="modal fade" id="modalForm1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content modal1">
        </div>
    </div>
</div>


<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">eventletrehozzas</h4>
            </div>
             
            <!-- Modal Body -->
            <div class="modal-body">
                <div style=" margin: auto; width: 50%;  padding: 10px;"> 
                <h4><p class="statusMsg"><span id="myspan" style="text-align: center; color:red;" ></span></p></h4>
                </div>
               
                <form method="post" action="eventmentes.php" id="insert_form" enctype="multipart/form-data">
                
                    <div class="form-group">
                        <label >Név</label>
                        <input type="text" class="form-control input1"  name="nev" id="nev" placeholder="Add meg a nevét"/>
                    </div>
                    <div class="form-group">
                        <label >időpont</label>
                        <input type="date" id="idopont" name="idopont" class="input1">
                    <div class="form-group">
                      <label  class="control-label">leiras</label>							
                      <textarea class="form-control input1" rows="5" id="leiras" name="leiras"></textarea>							
                    </div>	
                    <div class="form-group">
                        <label >tipus</label>
                        <select id="tipus" name="tipus" >
                          <?php 
                          $kapcsolat = new mysqli("localhost", "root", "", "darkbluemoon");
                          $lekerdezes = $kapcsolat->query("select * from jegytipus");
                          $tartalom ="";
                              while($sor = $lekerdezes->fetch_assoc()){
                                $tartalom .='<option value="'.$sor['nev'].'">'.$sor['nev'].'</option>';
                              }
                              echo $tartalom;
                          ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >férőhely</label>
                        <input type="number"class="form-control input1" id="ferohely" name="ferohely"  placeholder="1"/>
                    </div>
                    <div class="form-group">
                        <label >statusz</label>
                        <select id="statusz" name="statusz" >
                        <option value="privat">Privat</option>
                        <option value="publikus">publikus</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >kep</label>
                        <input  class="form-control input1" type="file" name="feltolt" id="feltolt" >
                    <div class="form-group">
                        <div id="selected-images"></div>

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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=6404dcc77e2407dfb2f3ed83" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://uploads-ssl.webflow.com/6404dcc77e2407dfb2f3ed83/js/webflow.1d3869c5a.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
  <script src="js/admin.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
         $("#insert ").on('click', function() {
  
  
            event.preventDefault();

            $('.input1').css("border-color", "#ccc");
            $('#idopont').css("background-color", "#ccc");
            var a = true;
           
        if($('#nev').val() == "")  
        {  
            
            $('#nev').css("border-color", "red");
            a = false;
           
        }
        if($('#idopont').val() == '')
        {  
           
            $('#idopont').css("background-color", "#d29a9a");
            a = false;
        }
        if($('#leiras').val() == '')  
        {  
            
            $('#leiras').css("border-color", "red");
            a = false;
        }  
        if($('#ferohely').val() == '')
        {  
           
            $('#ferohely').css("border-color", "red");
            a = false;
        }
       else if (a== true){$("#insert_form").submit();}
        else (a == false)
        {  
            document.getElementById("myspan").innerHTML="Minden mező kitöltése kötelező";
            
        }
         
    
});
 
 
    </script>
<style>

</style>
</body>
</html>