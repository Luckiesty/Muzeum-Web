<?php 


$szures = "";
if(isset($_POST["checkbox"])){
    foreach($_POST['checkbox'] as $elem ){
        $szures .= "AND type like '" .$elem."'";
    }
    
}

$kapcsolat = new mysqli("localhost", "root", "", "darkbluemoon");

$lekerdezes = $kapcsolat->query("select * from events WHERE statusz != 'privat' ".$szures);

 $tartalom = "";
            while($sor = $lekerdezes->fetch_assoc()){
                $tartalom .='
            <section class="team-slider wf-section">
            <div class="div-block-2">
            
                <div class="team-block">
                    <div class="top">
                    <img src="'.$sor['kep'].'" loading="lazy" alt="" class="team-member-image-two"/>
                    <div class="type"><strong><span class="text2">  '.$sor['type'].'</span></strong></div>
                    <div class="nev"><h3 >'.$sor['event'].'</h3></div>
                    </div>
                    
                    
                    <div class="team-block-info">
                   
                        <p class="team-member-text"><span class="text">'.$sor['leiras'].'</span></p>
                        <form action="" method="post">
                           <button type="submit" style="background-color:gray;  color:white;"> tudjmegtöbbet..</button>
                        </form>
                       ';
                       $lekerdezes2 = $kapcsolat->query("select *,(ferohely- SUM(mennyiseg)) as 'maradek' from events INNER JOIN foglalas ON events.id=foglalas.esemeny_id WHERE events.id = ".$sor['id'].";");
                       $sor2 = $lekerdezes2->fetch_assoc();
                       if(!$sor2['maradek']){
                        $sor2['maradek'] = 0;
                       }
                       $tartalom .='
                        <div>
                        <p class="team-member-text" style=""><b> '.$sor['ferohely'].' / '.$sor2['maradek'].'  FÕ</b></p>  <p class="team-member-text" style=""><b>'.$sor['mikor'].'</b></p>
                        </div>
                        
                        
                            
                            <div class="arrow-embed w-embed">';
                            if($sor['ferohely'] - $sor2['maradek'] == 0)
                            {
                                $tartalom .='<div class="btn btn-outline-success" style="color:blue;" >Elkelt</div>'; 
                            }else
                            {
                            $tartalom .='
                            
                            <a  class="btn btn-outline-success" style="color:blue;"  href="jegy_varsalas_modal.php?id='.$sor['id'].'">
                                jegyfoglalas</a>';
                            }
                            $tartalom .='
                        </div>
                    </div>
                </div>
                
            </div>
        </section>';
                 
            }
            print($tartalom);
?>