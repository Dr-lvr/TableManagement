<?php session_start();
$servername="localhost";
$username="root";
$password="";
$db="prodotti";
$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn){
  die("Connection failed: " . mysqli_connect_error());
}
$table=$_SESSION['working_table'];
$sql = "UPDATE $table SET `prezzo`=".$_POST['new_price']." WHERE `ID`=".$_POST['update_by_id'];
if ($conn->query($sql) === TRUE) {
  echo "Record ".$_POST['update_by_id']." updated successfully to ".$_POST['new_price'];
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
header("location: ../index.php");
?>
