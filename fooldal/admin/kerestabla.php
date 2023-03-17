<?php
<<<<<<< HEAD
$kapcsolat = new mysqli("localhost", "root", "", "darkbluemoon");


    $nev = $_POST['nev'];

 $lekerdezes = $kapcsolat->query("select * from felhasznalok WHERE neve  like '".$nev."%'");

    
     

  $tartalom = "";
        
            print(' 
                <table style="width:100%"class="styled-table">
            <thead><tr>
=======
session_start();
$kapcsolat = new mysqli("localhost", "root", "", "darkbluemoon");
    $nev = $_POST['nev'];
    $lekerdezes = $kapcsolat->query("select * from felhasznalok WHERE neve  like '".$nev."%'");

    
       

  $tartalom = "";
        print(' 
                <table style="width:100%">
            <tr>
>>>>>>> 32ff1c5bf554a6bd9aaabc5bdabb53fa977462d4
                <th>ID</th>
                <th>NÉV</th>
                <th>EMAIL</th>
                <Th>statusz</Th>
<<<<<<< HEAD
            </tr> </thead><tbody>');
=======
            </tr>');
            
>>>>>>> 32ff1c5bf554a6bd9aaabc5bdabb53fa977462d4
                    while($sor = $lekerdezes->fetch_assoc()){
                        $tartalom .='
                        <tr>
                        <td>'.$sor['id'].'</td>
                        <td>'.$sor['neve'].'</td>
                        <td>'.$sor['email'].'</td>
                        <td>'.$sor['statusz'].'</td>
                        <form method="post">
                        <td><a name="szerkesztes" href="?id='.$sor['id'].'">Szerkesztés</a></td>
<<<<<<< HEAD
                       
=======
                        <td><button name="torles" class="torles" type="submit">torles</button></td>
>>>>>>> 32ff1c5bf554a6bd9aaabc5bdabb53fa977462d4
                        </form>
                        </tr>';
                        
                    }
                    print($tartalom);

<<<<<<< HEAD
                    print "</tbody></table>";

 
   
=======
                    print "</table>";

>>>>>>> 32ff1c5bf554a6bd9aaabc5bdabb53fa977462d4
                    

?>