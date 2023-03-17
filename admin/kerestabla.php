<?php
session_start();
$kapcsolat = new mysqli("localhost", "root", "", "darkbluemoon");
    $nev = $_POST['nev'];
    $lekerdezes = $kapcsolat->query("select * from felhasznalok WHERE neve  like '".$nev."%'");

    
       

  $tartalom = "";
        print(' 
                <table style="width:100%">
            <tr>
                <th>ID</th>
                <th>NÉV</th>
                <th>EMAIL</th>
                <Th>statusz</Th>
            </tr>');
            
                    while($sor = $lekerdezes->fetch_assoc()){
                        $tartalom .='
                        <tr>
                        <td>'.$sor['id'].'</td>
                        <td>'.$sor['neve'].'</td>
                        <td>'.$sor['email'].'</td>
                        <td>'.$sor['statusz'].'</td>
                        <form method="post">
                        <td><a name="szerkesztes" href="?id='.$sor['id'].'">Szerkesztés</a></td>
                        <td><button name="torles" class="torles" type="submit">torles</button></td>
                        </form>
                        </tr>';
                        
                    }
                    print($tartalom);

                    print "</table>";

                    

?>