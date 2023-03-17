<?php

$kapcsolat = new mysqli("localhost", "root", "", "darkbluemoon");
        $lekerdezes = $kapcsolat->query("select * from events ");

    
       

  $tartalom = "";
        print(' 
                <table  class="styled-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nev</th>
                <th>leiras</th>
                <Th>mikor</Th>
                <th>jegytipus</th>
                <th>ferohely</th>
                <th>statusz</th>
                <th>kep</th>
            </tr>
            </thead>
            <tbody>');
            
                    while($sor = $lekerdezes->fetch_assoc()){
                        $tartalom .='
                        <tr>
                        <td>'.$sor['id'].'</td>
                        <td>'.$sor['event'].'</td>
                        <td ><span class="text">'.$sor['leiras'].'</span></td>
                        <td>'.$sor['mikor'].'</td>
                        <td>'.$sor['type'].'</td>
                        <td>'.$sor['ferohely'].'</td>
                        <td>'.$sor['statusz'].'</td>
                        <td><span class="text">'.$sor['kep'].'</span></td>
                      
                        <td> <a name="szerkesztes" class="szerk" href="?id='.$sor['id'].'">szerkesztés</a>
                    
        Name: <input type="text"  value="'.$sor['id'].'" name="name" 
        id="name"><br><br>
  
 

    <button type="button" class="btn btn-primary 
        btn-sm" data-toggle="modal" 
        data-target="#exampleModal"
        id="submit">
        Submit
    </button>
       
                        </a>  </td>
                        </tr>';
                        
                    }
                    

                    print($tartalom);
                    $id = $_GET['id'];
                    print "
                    </tbody></table>";       
                    
                        
?>
<div class="modal fade" id="exampleModal" 
      tabindex="-1" 
      aria-labelledby="exampleModalLabel" 
      aria-hidden="true">
        
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" 
                      id="exampleModalLabel">
                      Confirmation
                  </h5>
                    
                  <button type="button" 
                      class="close" 
                      data-dismiss="modal" 
                      aria-label="Close">
                      <span aria-hidden="true">
                          ×
                      </span>
                  </button>
              </div>

              <div class="modal-body">

                  <!-- Data passed is displayed 
                      in this part of the 
                      modal body -->
                  <h6 id="modal_body"></h6>
                  <button type="button" 
                      class="btn btn-success btn-sm" 
                      data-toggle="modal"
                      data-target="#exampleModal" 
                      id="submit">
                      Submit
                  </button>
              </div>
          </div>
      </div>
  </div>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <!-- Latest minified bootstrap css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
 <!-- jQuery library -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  
 <!-- Latest minified bootstrap js -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <!-- Button to trigger modal -->
 <h1>DSadDSad</h1>
 <div class="container mt-2">
  
  


  

<link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity=
"sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
        crossorigin="anonymous">
  
    <!-- Import jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity=
"sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous">
    </script>
      
    <script src=
"https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity=
"sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous">
    </script>
<script>
    var myRoomNumber;

    $("#submit").click(function () {
            var name = $("#name").val();
          
            var str = "You Have Entered " 
                + "Name: " + name 
                + " and Marks: " + marks;
            $("#modal_body").html(str);
        });
</script>
<?php
 
        
     
    
    ?>
</body>
</html>
