<?php

$kapcsolat = new mysqli("localhost", "root", "", "darkbluemoon");
        $lekerdezes = $kapcsolat->query("select * from events ");

  $tartalom = "";
        print(' <div id="table-scroll">
                <table  class="styled-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nev</th>
                <th>leiras</th>
                <Th>mikor</Th>
                <th>jegytipus</th>
                <th>ferohely</th>
                <th>statusz</th>
                <th>kep</th>
            </tr>
            </thead>
            <tbody>');
            
                    while($sor = $lekerdezes->fetch_assoc()){
                        $tartalom .='
                        <tr>
                        <td>'.$sor['id'].'</td>
                        <td>'.$sor['event'].'</td>
                        <td ><span class="text">'.$sor['leiras'].'</span></td>
                        <td>'.$sor['mikor'].'</td>
                        <td>'.$sor['type'].'</td>
                        <td>'.$sor['ferohely'].'</td>
                        <td>'.$sor['statusz'].'</td>
                        <td><span class="text">'.$sor['kep'].'</span></td>
                        <td><a data-toggle="modal"  data-target="#modalForm" id="list" data-id="'.$sor['id'].'"  class="btn btn-success btn-lg" href="#modalForm">
                        szerkesztés</a>
                        <a id="eventtorles"    href="eventtorles.php?id='.$sor['id'].'">
                        torles</a>
                        
                        </td>
                        
                        </tr>';
                        
                    }
        
                    print($tartalom);

                    print "
                    </tbody></table>
			</div>";       
                    ?>

<?php
if(isset($_POST['torles']))
{

    print("fdgd");
}
?>