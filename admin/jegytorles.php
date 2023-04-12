<?php
$id=$_POST['id'];

$conn = mysqli_connect("localhost", "root", "", "darkbluemoon"); 
$query = mysqli_query($conn, "DELETE FROM jegytipus WHERE jegy_id = '".$id."'");

?>