<?php
session_start();
$kapcsolat = new mysqli("localhost", "root", "", "darkbluemoon");
$lekerdezes = $kapcsolat->query("select * from felhasznalok WHERE id!=".$_SESSION['id']."");

    
       

  $tartalom = "";
        print(' <div id="table-scroll">
                <table style="width:100%" class="styled-table">
            <thead><tr>
                <th>ID</th>
                <th>NÉV</th>
                <th>EMAIL</th>
                <Th>statusz</Th>
            </tr> </thead><tbody>');
            
                    while($sor = $lekerdezes->fetch_assoc()){
                        $tartalom .='
                        <tr>
                        <td>'.$sor['id'].'</td>
                        <td>'.$sor['neve'].'</td>
                        <td>'.$sor['email'].'</td>
                        <td>'.$sor['statusz'].'</td>
                        <td><a data-toggle="modal"  data-target="#modalForm" id="felhasznalomodal" data-id="'.$sor['id'].'"  class="btn btn-success btn-lg" href="#modalForm">
                        szerkesztés</a>
                        <form action="felhasznalo_torles.php" method="post" id="tor">
                        <input type="hidden" name="id" id="id" value="'.$sor['id'].'">
                        <button class="torles" type="submit">Törlés</button> 
                        </form>
                        </td>
                        </tr>';
                        
                    }
                    
print($tartalom);
                    print "</tbody></table></div>";
                  


?>