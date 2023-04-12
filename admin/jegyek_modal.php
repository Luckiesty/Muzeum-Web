<?php
$kapcsolat = new mysqli("localhost", "root", "", "darkbluemoon");
$id = $_GET['id'];
 $lekerdezes2 = $kapcsolat->query("select * from jegytipus where jegy_id=".$id."");
 if($sor = $lekerdezes2->fetch_assoc()){
    ?>
<!-- Modal Header -->
<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Jegyszerkesztése</h4>
            </div>
             
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form method="post" action="jegyek_szerkesztes.php?id=<?php echo $id?>" id="insert_form" >
                    <div class="form-group">
                        <label >Név</label>
                        <input type="text" class="form-control"  name="nev" id="nev" value="<?php echo $sor['nev']?>"/>
                    </div>
                    <div class="form-group">
                        <label >Tipus</label>
                        <input type="text" class="form-control"  name="tipus" id="tipus"value="<?php echo $sor['tipus']?>"/>
                    </div>
                    <div class="form-group">
                        <label >ÁR</label>
                        <input type="text"class="form-control" id="ar" name="ar" value="<?php echo $sor['ar']?>"/>
                    </div>
                
                    <input type="submit"  name="insert" id="insert" value="Insert" class="btn btn-success" onclick="adduser()" />
                </form>
            </div>
             
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
                
            </div>
            <?php
 }
            ?>