<?php
$id=$_POST['id'];
print($id);
$conn = mysqli_connect("localhost", "root", "", "darkbluemoon"); 
$query = mysqli_query($conn, "DELETE FROM foglalas WHERE foglalas_id = '".$id."'");
header("location: foglalas.php");
?>