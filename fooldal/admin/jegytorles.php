<?php
$id=$_POST['id'];
print($id);
$conn = mysqli_connect("localhost", "root", "", "darkbluemoon"); 
$query = mysqli_query($conn, "DELETE FROM jegytipus WHERE jegy_id = '".$id."'");

?>