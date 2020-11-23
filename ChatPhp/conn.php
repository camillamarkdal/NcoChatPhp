<?php
 
//MySQLi Procedural
$conn = mysqli_connect("localhost","root","","chatroom");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>