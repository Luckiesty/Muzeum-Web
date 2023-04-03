<?php 
require_once("webshop/db_controller.php");
$db_handle = new DB_Kontroller();
if(!empty($_GET["action"])) {
	switch($_GET["action"]) {
		case "add":
			if(!empty($_POST["quantity"])) {
				$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
				$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
				
				if(!empty($_SESSION["cart_item"])) {
					if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
						foreach($_SESSION["cart_item"] as $k => $v) {
								if($productByCode[0]["code"] == $k) {
									if(empty($_SESSION["cart_item"][$k]["quantity"])) {
										$_SESSION["cart_item"][$k]["quantity"] = 0;
									}
									$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
								}
						}
					} else {
						$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
					}
				} else {
					$_SESSION["cart_item"] = $itemArray;
				}
			}
		break;
		case "remove":
			if(!empty($_SESSION["cart_item"])) {
				foreach($_SESSION["cart_item"] as $k => $v) {
						if($_GET["code"] == $k)
							unset($_SESSION["cart_item"][$k]);				
						if(empty($_SESSION["cart_item"]))
							unset($_SESSION["cart_item"]);
				}
			}
		break;
		// case "empty":
		// 	unset($_SESSION["cart_item"]);
		// break;	
	}
	}
	?>
	<html>
	<head>
	<title>Múzeum Shop</title>
	<link rel="stylesheet" href="webshop/webshop_style.css">
	</head>
	<body>
	<div id="shopping-cart">
	<div class="txt-heading">Kosár</div>
	
	<a id="btnEmpty" href="webshop.php?action=empty">Üres kosár</a>
	<?php
	if(isset($_SESSION["cart_item"])){
		$total_quantity = 0;
		$total_price = 0;
	?>	
	<table class="tbl-cart" cellpadding="10" cellspacing="1">
	<tbody>
	<tr>
	<th style="text-align:left;">Név</th>
	<th style="text-align:left;">Kód</th>
	<th style="text-align:right;" width="5%">Mennyiség</th>
	<th style="text-align:right;" width="10%">Darabár</th>
	<th style="text-align:right;" width="10%">Ár</th>
	<th style="text-align:center;" width="5%">Eltávolítás</th>
	</tr>	
	<?php		
		foreach ($_SESSION["cart_item"] as $item){
			$item_price = $item["quantity"]*$item["price"];
			?>
					<tr>
					<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo utf8_encode($item["name"]); ?></td>
					<td><?php echo $item["code"]; ?></td>
					<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
					<td  style="text-align:right;"><?php echo $item["price"]."Ft"; ?></td>
					<td  style="text-align:right;"><?php echo number_format($item_price)."Ft"; ?></td>
					<td style="text-align:center;"><a href="webshop.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Eltávolítás" /></a></td>
					</tr>
					<?php
					$total_quantity += $item["quantity"];
					$total_price += ($item["price"]*$item["quantity"]);
			}
			?>
	
	<tr>
	<td colspan="2" align="right">Végösszeg:</td>
	<td align="right"><?php echo $total_quantity; ?></td>
	<td align="right" colspan="2"><strong><?php echo number_format($total_price)."Ft"; ?></strong></td>
	<td></td>
	</tr>
	</tbody>
	</table>		
	  <?php
	} else {
	?>
	<div class="no-records">A kosara üres.</div>
	<?php 
	}
	?>
	</div>
	
	<div id="product-grid">
		<div class="txt-heading">Termékek</div>
		<?php
		$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
		if (!empty($product_array)) { 
			foreach($product_array as $key=>$value){
		?>
			<div class="product-item">
				<form method="post" action="webshop.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
				<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
				<div class="product-tile-footer">
				<div class="product-title"><?php echo utf8_encode($product_array[$key]["name"]); ?></div>
				<div class="product-price"><?php echo $product_array[$key]["price"]."Ft"; ?></div>
				<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Kosárhoz hozzáadás" class="btnAddAction" /></div>
				</div>
				</form>
			</div>
		<?php
			}
		}
		?>
	</div>
	</body>
	</html>