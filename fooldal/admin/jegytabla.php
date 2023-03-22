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
<<<<<<< HEAD
                        <form method="post">
                        <td><a name="szerkesztes" href="?id='.$sor['jegy_id'].'">Szerkesztés</a></td>
=======
                        <td><a data-toggle="modal"  data-target="#modalForm1" id="jegy_modal" data-id="'.$sor['jegy_id'].'"  class="btn btn-success btn-lg" href="#modalForm">
                        szerkesztés</a>
                        <form action="jegytorles.php" method="post" id="tor">
                        <input type="number" name="id" id="id" value="'.$sor['jegy_id'].'">
                        <button class="torles" type="submit">Törlés</button> 
>>>>>>> 740541d6dee3a90aebbeef4b011316910f73e658
                        </form>
                        </tr>';
                        
                    }
                    print($tartalom);

                    print "</tbody></table>";



?>