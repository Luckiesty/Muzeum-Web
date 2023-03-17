<?php
$kapcsolat = new mysqli("localhost", "root", "", "darkbluemoon");
$id = $_GET['id'];

print($id);
if(isset($_GET['id']))
     {
    
        
      
           
            $lekerdezes3 = $kapcsolat->query("select * from events where id=".$id."");
            if($sor = $lekerdezes3->fetch_assoc()){
            print('<div class="szerkesztes2">
            
            <form method="post" id="szek" action="szerkesztes.php?id='.$id.'">
            <h2>Szerkesztés</h2>
                                <label>nev</label>
                                <input type="text" name="nevfris" value="'.$sor['event'].'" id="nev"><br>
                                <label >mikor</label>
                                <input type="datetime-local" id="idopont" name="idopont"  value="'.$sor['mikor'].'"><br>
                                <label >email</label>
                                <textarea class="form-control" rows="5" id="leiras" name="leiras" >'. $sor['leiras'].'</textarea>	
                                
                                <label >státusz</label>
                                <select id="statusz" name="statuszfris">
                                    <option value="admin">admin</option>
                                    <option value="felhasznalo">felhasznalo</option>
                                </select>
                                <a name="szerkesztes" class="torles" href="torles.php?id='.$id.'">Törlés</a>
                                <button name="feltolt" class="fris" type="submit">mentés</button>
                        </form>
                       
                        </div> ');
            }
      
        

    }
?>