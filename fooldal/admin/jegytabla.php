<?php

$kapcsolat = new mysqli("localhost", "root", "", "darkbluemoon");
        $lekerdezes = $kapcsolat->query("select * from jegytipus ");

    
       

  $tartalom = "";
        print(' 
                <table style="width:100%" class="styled-table">
            <thead><tr>
                <th>ID</th>
                <th>Neve</th>
                <th>Tipusa</th>
                <Th>Ára</Th>
            </tr>
 </thead><tbody>');
            
                    while($sor = $lekerdezes->fetch_assoc()){
                        $tartalom .='
                        <tr>
                        <td>'.$sor['jegy_id'].'</td>
                        <td>'.$sor['nev'].'</td>
                        <td>'.$sor['tipus'].'</td>
                        <td>'.$sor['ar'].'</td>
                        <form method="post">
                        <td><a name="szerkesztes" href="?id='.$sor['jegy_id'].'">Szerkesztés</a></td>
                        </form>
                        </tr>';
                        
                    }
                    print($tartalom);

                    print "</tbody></table>";



?>