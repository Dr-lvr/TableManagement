<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$db="prodotti";
$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn){
  die("Connection failed: " . mysqli_connect_error()). "<br>";
}
else {
  $sql = "DELETE FROM `frutteria` WHERE".$_POST['delete_by_id'];;
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
  header("location: ../index.php");
}
?>
