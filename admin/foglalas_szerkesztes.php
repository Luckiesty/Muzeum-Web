<?php
   use PHPMailer\PHPMailer\PHPMailer;
   require_once "PHPMailer/PHPMailer.php";
   require_once "PHPMailer/SMTP.php";
   require_once "PHPMailer/Exception.php";
   $mail = new PHPMailer();

   //SMTP Settings
   $mail->isSMTP();
   $mail->Host = "smtp.gmail.com";
   $mail->SMTPAuth = true;
   $mail->Username = "darkbluemoo2001@gmail.com";//ide jön a küldő Gmail cím
   $mail->Password = "qzcmcnxbpycnsksv";//jelszó
   $mail->Port = 465; //587
   $mail->SMTPSecure = "ssl"; //tls
   $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
    $id = $_GET['id'];
    $nev = $_POST['nev'];
    $email= $_POST['email'];
    $elerhetoseg = $_POST['elerhetoseg'];
    $mennyiseg = $_POST['mennyiseg'];
    $statusz = $_POST['statusz'];
      $kapcsolat = mysqli_connect("localhost", "root", "", "darkbluemoon");
      $lekerdezes2 = mysqli_query($kapcsolat, "UPDATE foglalas SET nev='".$nev."',email='".$email."',elerhetoseg='".$elerhetoseg."' ,mennyiseg=".$mennyiseg."
      ,statusz='".$statusz."' WHERE foglalas_id=".$id." ");
      
      if($statusz == "elfogadva")
      {

        $targy="Küldés emailre";
        $oldal_cime="Sikeres küldés2";
        $tartalma='<h1>Foglalását ellenőriztük és elfogadtuk</h1>
        <h3>Az ön belépő kódja: '.$verification_code.'</h3>'; 

        $mail->isHTML(true);
        $mail->setFrom($email, $oldal_cime);
        $mail->addAddress($email);

        $mail->Subject = $targy;
        $mail->Body =$tartalma;
        $mail->CharSet = 'UTF-8';  
	if(!$mail->Send())
    {
   echo "Hiba a levél küldésekor. Próbálja újra!";
        exit;
    }

    echo "Az üzenet sikeresen továbbítva.";
    $lekerdezes3 = mysqli_query($kapcsolat, "UPDATE foglalas SET code='".$verification_code."' WHERE foglalas_id=".$id." ");

    
      }else
        {

        $targy="Küldés emailre";
        $oldal_cime="Sikeres küldés2";
        $tartalma='<h1>Foglalását ellenőriztük és bizonyos okokból elutasítottuk</h1>'; 

        $mail->isHTML(true);
        $mail->setFrom($email, $oldal_cime);
        $mail->addAddress($email);

        $mail->Subject = $targy;
        $mail->Body =$tartalma;
        $mail->CharSet = 'UTF-8'; 
        if(!$mail->Send())
    {
   echo "Hiba a levél küldésekor. Próbálja újra!";
        exit;
    }
        
      }

      header("location: foglalas.php");
      
      

?>
