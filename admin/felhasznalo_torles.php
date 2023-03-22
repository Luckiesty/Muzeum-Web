<?php
$id = $_GET['id'];
$conn = mysqli_connect("localhost", "root", "", "darkbluemoon"); 
$query = mysqli_query($conn, "DELETE FROM felhasznalok WHERE id = '".$id."'");
header('location: adminfelulet.php');
?>