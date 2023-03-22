<?php
$kapcsolat = new mysqli("localhost", "root", "", "darkbluemoon");
$id = $_GET['id'];
 $lekerdezes2 = $kapcsolat->query("select * from events where id=".$id."");
 if($sor = $lekerdezes2->fetch_assoc()){
$kep = $sor["kep"];

    ?>
<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">event szerkesztese</h4>
        </div>
         
        <!-- Modal Body -->
        <div class="modal-body">
            <p class="statusMsg"></p>
            <form method="post" action="eventszerkesztes.php?id=<?php echo $id?>" id="insert_form" enctype="multipart/form-data">
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
                    <option value="publikus">publikus</option>
                    </select>
                </div>
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
                <div class="form-group">
                    <label >kep</label>
                    <input  class="form-control" type="file" name="feltolt" id="feltolt"  >
                    <?php         
                        print('<img class="img-responsive" style="margin:0 auto"; src="'.$kep.'" alt="bannerkep">');
                          ?>
                    

                    
                <div class="form-group">
                

            </form>
        </div>
         
        <!-- Modal Footer -->
        <div class="modal-footer">
            <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
            <input type="submit"  name="insert" id="insert" value="Insert" class="btn btn-success Insert"/>
        </div>
        <?php
        }

        ?>
