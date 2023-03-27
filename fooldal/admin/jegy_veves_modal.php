
<!-- Modal Header -->
<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Jegyhozzáaddás</h4>
            </div>
             
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form method="post" action="jegy_veves.php" id="insert_form" >
                    <div class="form-group">
                        <label >Teljes nev</label>
                        <input type="text" class="form-control"  name="nev" id="nev" />
                    </div>
                    <div class="form-group">
                        <label >email</label>
                        <input type="text" class="form-control"  name="tipus" id="tipus"value="<?php echo $sor['tipus']?>"/>
                    </div>
                    <div class="form-group">
                        <label ></label>
                        <input type="text"class="form-control" id="ar" name="ar" value="<?php echo $sor['ar']?>"/>
                    </div>
                
                    <input type="submit"  name="insert" id="insert" value="Insert" class="btn btn-success" onclick="adduser()" />
                </form>
            </div>
             
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button"  class="btn btn-default" data-dismiss="modal">Close</button>
                
            </div>
 