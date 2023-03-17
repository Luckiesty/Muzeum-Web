<?php
session_start();
$kapcsolat = new mysqli("localhost", "root", "", "darkbluemoon");
$lekerdezes = $kapcsolat->query("select * from felhasznalok WHERE id!=".$_SESSION['id']."");

    
       

  $tartalom = "";
        print(' 
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
                        <form method="post">
                        <td><a name="szerkesztes" href="?id='.$sor['id'].'">Szerkesztés</a></td>
                        </form>
                        </tr>';
                        
                    }
                    
print($tartalom);
                    print "</tbody></table>";



?>