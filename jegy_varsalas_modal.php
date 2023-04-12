<?php
session_start();
$kapcsolat = new mysqli("localhost", "root", "", "darkbluemoon");
$id = $_GET['id'];
$lekerdezes2 = $kapcsolat->query("select * from events where id=".$id."");
if($sor = $lekerdezes2->fetch_assoc()){
    ?>
    <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
.slider {


padding: 30px;
padding-left: 40px;
background: #fcfcfc;
border-radius: 20px;
height: 100px;
width: 400px;
align-items: center;
box-shadow: 0px 15px 40px #7E6D5766;
}
.slider p {
font-size: 20px;
font-weight: 600;
font-family: Open Sans;
padding-left: 30px;
color: black;
}
.slider input[type="range"] {
-webkit-appearance:none !important;
width: 320px;
height: 2px;
background: black;
border: none;
outline: none;
}
.slider input[type="range"]::-webkit-slider-thumb {
-webkit-appearance: none !important;
width: 30px;
height:30px;
background: black;
border: 2px solid black;
border-radius: 50%;
cursor: pointer;
}
.slider input[type="range"]::-webkit-slider-thumb:hover {
background: black;
}
</style>
</head>
<body onload="outputUpdate(1);">

<h2>Jegy foglalás</h2>
<div class="row">
  <div class="col-75">
    <div class="container">
    <h4><p class="statusMsg"><span id="myspan" style="text-align: center; color:red;" ></span></p></h4>
      <form  method="post" id="form" action="jegyfoglalas.php">
      <input type="hidden" name="id" id="id" value="<?php echo $id?>">
        <div class="row">
          <div class="col-50">
            <h3>Hol érhetünk el?</h3>
            <label for="fname"><i class="fa fa-user"></i>Teljes név</label>
            <input type="text" id="nev" name="nev" >
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" >
            <label for="adr"><i class="fa fa-address-card-o"></i>Cím</label>
            <input type="text" id="cim" name="cim">
            <label for="city"><i class="fa fa-institution"></i> Város</label>
            <input type="text" id="varos" name="varos" >
            

            <div class="row">
              <div class="col-50">
                <label for="state">Állam</label>
                <input type="text" id="allam" name="allam">
              </div>
              <div class="col-50">
                <label for="zip">Postai irányítószám</label>
                <input type="text" id="iranyito" name="iranyito" >
              </div>
            </div>
          </div>
          <div class="col-50">
            <h3>Eseményről</h3>
            <h4>Fentmaradó férőjely</h4>
            <?php
             $lekerdezes2 = $kapcsolat->query("select *, (ferohely- SUM(mennyiseg)) as 'maradek' from events INNER JOIN foglalas ON events.id=foglalas.esemeny_id WHERE events.id = ".$id.";");
             if($sor = $lekerdezes2->fetch_assoc()){
              if(!$sor['maradek']){
                $sor['maradek'] = $sor['ferohely'];
                print('<input type="hidden" name="ferohely" id="ferohely" value="'.$sor['maradek'].'">');
               }
              print( '<label for="cname">'. $sor['maradek'].'</label>');
              print('<h4>Hány jegyet szeretnél foglalni?</h4> 
              <div class="slider">
              <input id="slider" type="range"  min="1" name="meny" max="'.$sor['maradek'].'" value="1" id="slider" oninput="rangeValue.innerText = this.value; outputUpdate(value);">
              <p id="rangeValue">1</p>
              </div><br>');
           }
            ?>
            

            <?php 
            $lekerdezes2 = $kapcsolat->query("select * from events INNER JOIN jegytipus ON events.type=jegytipus.nev where id=".$id."");
            if($sor = $lekerdezes2->fetch_assoc()){
               print('<h4>Jegy ár</h4>');
               print( '1db/'.$sor['ar'].'FT <input type="hidden" id="ar" value="'.$sor['ar'].'"><br> <input type="hidden" name="vegsoar" id="vegsoar" value="'.$sor['ar'].'">');
            }
            
            ?>
                             
           
            <h4>Esemény Idő pontja</h4>
            <label for="expmonth"><?php echo $sor['mikor']?></label>
            <div class="row">
            </div>
          </div>
         
        </div>
        <input type="submit" value="Lefoglalás" class="btn" id="gomb">
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container">
      
      <p>összesen <span class="price" style="color:black"><b><output for=value id="output"  oninput="arvaltozik(value);" >0 </output>FT</b></span></p>
       
    </div>
   
  </div>

</div>
<a class="btn btn-outline-success" href="home.php">Mégsem</a>

<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=6404dcc77e2407dfb2f3ed83" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://uploads-ssl.webflow.com/6404dcc77e2407dfb2f3ed83/js/webflow.1d3869c5a.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
  <script src="traffic.js"></script>
</body>
</html>

<script >
function outputUpdate(num) {
   var szam = document.getElementById("ar").value;
   console.log(szam);
document.querySelector('#output').value = num*szam;
};



$("#gomb ").on('click', function() {
  
  
  event.preventDefault();

  $('.input1').css("border-color", "#ccc");
  $('#idopont').css("background-color", "#ccc");
  var a = true;
 
if($('#nev').val() == "")  
{  
  
  $('#nev').css("border-color", "red");
  a = false;
 
}
if($('#email').val() == '')
{  
 
  $('#email').css("background-color", "#d29a9a");
  a = false;
}
if($('#cim').val() == '')  
{  
  
  $('#cim').css("border-color", "red");
  a = false;
}  
if($('#varos').val() == '')
{  
 
  $('#varos').css("border-color", "red");
  a = false;
}
if($('#allam').val() == '')
{  
 
  $('#allam').css("border-color", "red");
  a = false;
}
if($('#iranyito').val() == '')
{  
 
  $('#iranyito').css("border-color", "red");
  a = false;
}
else if (a== true){$("#form").submit();}
else (a == false)
{  
  document.getElementById("myspan").innerHTML="Minden mező kitöltése kötelező";
  
}


});
</script>

<?php
        
}
?>

    

