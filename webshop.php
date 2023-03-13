<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Webshop</title>
</head>
<body>
<?php

$termek_tomb = $conn->runQuery("SELECT * FROM termek_lista ORDER BY id ASC");
if (!empty($termek_tomb)) { 
	foreach($termek_tomb as $key=>$value){
?>
	<div class="termek-targy">
		<form method="post" action="webshop.php?action=add&code=<?php echo $termek_tomb[$key]["code"]; ?>">
		<div class="termek-kep"><img src="<?php echo $termek_tomb[$key]["kep"]; ?>"></div>
		<div class="termek-lab">
		<div class="termek-cim"><?php echo $termek_tomb[$key]["nev"]; ?></div>
		<div class="termek-ar"><?php echo "$".$termek_tomb[$key]["ar"]; ?></div>
		<div class="kosar-action"><input type="text" class="termek-menny" name="menny" value="1" size="2" /><input type="submit" value="Kosárhoz hozzáadás" class="btnAddAction" /></div>
		</div>
		</form>
	</div>
<?php
	}
}
?>
</body>
</html>