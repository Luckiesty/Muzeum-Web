<?php 
require_once("db_controller.php");
$db_kezeles = $conn();
if(!empty($_GET["muvelet"]))
{
	switch($_GET["muvelet"])
	{
		case "hozzaadas":
			if(!empty($_POST["mennyiseg"]))
			{
				$termek_Kodbol = $db_kezeles->runQuery();
			}
	}
}
?>

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

</body>
</html>