<?php
$kapcsolat = new mysqli("localhost", "root", "", "darkbluemoon");
$id = $_GET['id'];
 $lekerdezes2 = $kapcsolat->query("select * from felhasznalok where id=".$id."");
 if($sor = $lekerdezes2->fetch_assoc()){
    ?>
     <div class="modal-content">
<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">felhasznalo szerkesztese</h4>
        </div>
         
        <!-- Modal Body -->
        <div class="modal-body">
            <p class="statusMsg"></p>
            <form method="post" action="felhasznalo_szerkesztes.php?id=<?php echo $id?>" id="insert_form" >
                <div class="form-group">
                    <label >Név</label>
                    <input type="text" class="form-control"  name="nevfris" id="nev" value="<?php echo $sor['neve']?>">
                </div><div class="form-group">
                    <label >Email</label>
                    <input type="text" class="form-control"  name="emailfris" id="email" value="<?php echo $sor['email']?>">
                </div>
                
                <div class="form-group">
                <label >státusz</label>
                                <select id="statusz" name="statuszfris">
                                    <option value="admin">admin</option>
                                    <option value="felhasznalo">felhasznalo</option>
                                </select>
                </div>
               
                <div class="modal-footer">
            <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
            <input type="submit"  name="insert" id="insert" value="Insert" class="btn btn-success Insert"/>
        </div>
            </form>
        </div>
         
        <!-- Modal Footer -->
       
 </div>
        <?php
        }

        ?>
