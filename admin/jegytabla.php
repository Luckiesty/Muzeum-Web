<?php

$kapcsolat = new mysqli("localhost", "root", "", "darkbluemoon");
        $lekerdezes = $kapcsolat->query("select * from jegytipus ");

    
       

  $tartalom = "";
        print(' <div id="table-scroll">
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
                        <td><a data-toggle="modal"  data-target="#modalForm" id="jegy_modal" data-id="'.$sor['jegy_id'].'"  class="btn btn-success btn-lg" href="#modalForm">
                        szerkesztés</a>
                        <a id="jegytorles"   href="jegytorles.php?id='.$sor['jegy_id'].'">
                        torles</a>
                        
                        </td>
                        </tr>';
                        
                    }
                    print($tartalom);

                    print "</tbody></table>
                    </div>";



?>