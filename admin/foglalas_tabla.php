
<?php

$kapcsolat = new mysqli("localhost", "root", "", "darkbluemoon");
        $lekerdezes = $kapcsolat->query("select * from foglalas ");

  $tartalom = "";
        print(' <div id="table-scroll">
                <table  class="styled-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>esemeny_id</th>
                <th>nev</th>
                <Th>email</Th>
                <th>elerhetoseg</th>
                <th>mennyiseg</th>
                <th>statusz</th>
                
            </tr>
            </thead>
            <tbody>');
            
                    while($sor = $lekerdezes->fetch_assoc()){
                        $tartalom .='
                        <tr>
                        <td>'.$sor['foglalas_id'].'</td>
                        <td>'.$sor['esemeny_id'].'</td>
                        <td ><span class="text">'.$sor['nev'].'</span></td>
                        <td>'.$sor['email'].'</td>
                        <td>'.$sor['elerhetoseg'].'</td>
                        <td>'.$sor['mennyiseg'].'</td>
                        <td>'.$sor['statusz'].'</td>
                        <td><a data-toggle="modal"  data-target="#modalForm1" id="list1" data-id="'.$sor['foglalas_id'].'"  class="btn btn-success btn-lg" href="#modalForm">
                        szerkesztés</a>
                        <form action="foglalas_torles.php" method="post" id="tor">
                        <input type="hidden" name="id" id="id" value="'.$sor['foglalas_id'].'">
                        <button class="torles" type="submit">Törlés</button> 
                        </form>
                        </td>
                        
                        </tr>';
                        
                    }
        
                    print($tartalom);

                    print "
                    </tbody></table>
			</div>";       
                    ?>
