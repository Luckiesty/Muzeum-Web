<?php 
require_once("webshop/db_controller.php");
$db_handle = new DB_Kontroller();
if(!empty($_GET["muvelet"]))
{
	switch($_GET["muvelet"])
	{
		case "hozzaadas":
			if(!empty($_POST["mennyiseg"]))
			{
				$productByCode = $db_handle->runQuery("SELECT * FROM termek_tabla WHERE termek_kod='". $_GET["termek_kod"]. "'");
				$itemArray = array($productByCode[0]["termek_kod"] => array(
					'termek_nev' => $productByCode[0]["termek_nev"],
					'termek_kod' => $productByCode[0]["termek_kod"],
					'mennyiseg' => $_POST["mennyiseg"],
					'termek_ar' => $productByCode[0]["termek_ar"],
					'termek_kep' => $productByCode[0]["termek_kep"]
				));
			}

			if(!empty($_SESSION["kosar_targyak"])) {
				if(in_array($productByCode[0]["termek_kod"],array_keys($_SESSION["kosar_targyak"]))) {
					foreach($_SESSION["kosar_targyak"] as $k => $v) {
							if($productByCode[0]["termek_kod"] == $k) {
								if(empty($_SESSION["kosar_targy"][$k]["mennyiseg"])) {
									$_SESSION["kosar_targyak"][$k]["mennyiseg"] = 0;
								}
								$_SESSION["kosar_targyak"][$k]["mennyiseg"] += $_POST["mennyiseg"];
							}
					}
				} else {
					$_SESSION["kosar_targyak"] = array_merge($_SESSION["kosar_targyak"],$itemArray);
				}
			} else {
				$_SESSION["kosar_targyak"] = $itemArray;
			}
			break;
			case "eltavolitas":
				if(!empty($_SESSION["kosar_targyak"])) {
					foreach($_SESSION["kosar_targyak"] as $k => $v) {
						if($_GET["termek_kod"] == $k)
							unset($_SESSION["kosar_targyak"][$k]);				
						if(empty($_SESSION["kosar_targyak"]))
							unset($_SESSION["kosar_targyak"]);
					}
				}
				break;
			case "ures":
				unset($_SESSION["kosar_targyak"]);
					break;
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
	<link rel="stylesheet" href="webshop/webshop_style.css">
    <title>Webshop</title>
</head>
<body>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>

<a id="btnEmpty" href="index.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>
<?php
$product_array = $db_handle->runQuery("SELECT * FROM termek_tabla ORDER BY id ASC");
if (!empty($product_array)) { 
	foreach($product_array as $key=>$value){
?>
	<div class="product-item">
		<form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["termek_kod"]; ?>">
		<div class="product-image"><img src="<?php echo $product_array[$key]["termek_kep"]; ?>"></div>
		<div class="product-tile-footer">
		<div class="product-title"><?php echo utf8_encode($product_array[$key]["termek_nev"]); ?></div>
		<div class="product-price"><?php echo $product_array[$key]["termek_ar"]. " Ft"; ?></div>
		<div class="cart-action"><input type="text" class="product-quantity" name="mennyiseg" value="1" size="2" /><input type="submit" value="Kosárhoz hozzáadás" class="btnAddAction" /></div>
		</div>
		</form>
	</div>
<?php
	}
}
?>
</body>
</html>