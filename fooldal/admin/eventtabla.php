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
                        </form>
                        <td> <a name="szerkesztes" class="szerk" href="?id='.$sor['id'].'">szerkesztés</a>
                        
                        </a>  </td>
                        </tr>';
                        
                    }
                    $id = $_GET['id'];

                    print($tartalom);

                    print "
                    </tbody></table>";       
                    if(isset($_GET['id'])){
                        
?>

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
    <?php
     if(isset($_GET['id']))
     {
     $lekerdezes2 = $kapcsolat->query("select * from events where id=".$id."");
     if($sor = $lekerdezes2->fetch_assoc()){
        ?>
       <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm" data-id="2">
       eventletrehozzas
        </button>    
<!-- Modal -->
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
            <p class="statusMsg"></p>
            <form method="post" action="eventszerkesztes.php" id="insert_form" enctype="multipart/form-data">
                <div class="form-group">
                    <label >Név</label>
                    <input type="text" class="form-control"  name="nev" id="nev" value="<?php echo $sor['event']?>">
                </div>
                
                <div class="form-group">
                    <label >időpont</label>
                    <input type="datetime-local" id="idopont" name="idopont"  value="<?php echo $sor['mikor']?>">
                <div class="form-group">
                  <label  class="control-label">leiras</label>							
                  <textarea class="form-control" rows="5" id="leiras" name="leiras" ><?php echo $sor['leiras']?></textarea>							
                </div>	
                <div class="form-group">
                    <label >férőhely</label>
                    <input type="number"class="form-control" id="ferohely"  value="<?php echo $sor['ferohely']?>" name="ferohely" />
                </div>
                <div class="form-group">
                    <label >statusz</label>
                    <select id="statusz" name="statusz"  value="<?php echo $sor['statusz']?>">
                    <option value="privat">Privat</option>
                    <option value="privat">publikus</option>
                    </select>
                </div>
                <div class="form-group">
                    <label >kep</label>
                    <input  class="form-control" type="file" name="feltolt" id="feltolt"  value="<?php echo $sor['kep']?>">
                <div class="form-group">
                <div class="form-group">
                    <label >tipus</label>
                    <select id="tipus" name="tipus">
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

            </form>
        </div>
         
        <!-- Modal Footer -->
        <div class="modal-footer">
            <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
            <input type="submit"  name="insert" id="insert" value="Insert" class="btn btn-success"/>
        </div>
    </div>
</div>
</div>

<?php
 
        }
     }
    }
    ?>
</body>
</html>
