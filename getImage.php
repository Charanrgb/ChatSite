<?php
include "DB_Conn.php"; 
$username = $_GET['username'];
$sql = "select profilePic from userdetails where (name='$username');";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($res);
header("Content-type:image/jpeg");
echo $row['profilePic'];
?>