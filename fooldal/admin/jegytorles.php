<?php
$id=$_GET['id'];
print($id);
$conn = mysqli_connect("localhost", "root", "", "darkbluemoon"); 
$query = mysqli_query($conn, "DELETE FROM jegytipus WHERE jegy_id = '".$id."'");
header("location: jegyek.php");
?>