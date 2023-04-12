<?php
$kapcsolat = new mysqli("localhost", "root", "", "darkbluemoon");
$id = $_GET['id'];
 $lekerdezes2 = $kapcsolat->query("select * from foglalas where foglalas_id=".$id."");
 if($sor = $lekerdezes2->fetch_assoc()){


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
            <form method="post" action="foglalas_szerkesztes.php?id=<?php echo $id?>" id="insert_form" >
                <div class="form-group">
                    <label >Név</label>
                    <input type="text" class="form-control"  name="nev" id="nev" value="<?php echo $sor['nev']?>">
                </div>
                <div class="form-group">
                  <label  class="control-label">Email</label>							
                  <textarea class="form-control" rows="5" id="leiras" name="email" ><?php echo $sor['email']?></textarea>							
                </div>	
                <div class="form-group">
                    <label >Elérhetőség</label>
                    <input type="text"class="form-control" id="ferohely"  value="<?php echo $sor['elerhetoseg']?>" name="elerhetoseg" />
                </div>
                <div class="form-group">
                    <label >Mennyiség</label>
                    <input type="number "class="form-control" id="ferohely"  value="<?php echo $sor['mennyiseg']?>" name="mennyiseg" />
                </div>
                <div class="form-group">
                    <label >statusz</label>
                    <select id="statusz" name="statusz"  value="<?php echo $sor['statusz']?>">
                    <option value="privat">kerelem</option>
                    <option value="elfogadva">elfogadva</option>
                    <option value="elutasitva">elutasítva</option>
                    </select>
                </div>
                
               
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit"  name="insert" id="insert" value="Insert" class="btn btn-success Insert"/>
                </div>

            </form>
        </div>
         
        
        <?php
        }

        ?>
