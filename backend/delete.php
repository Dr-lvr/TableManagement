<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
  <?php
  $servername="localhost";
  $username="root";
  $password="";
  $db="prodotti";
  $conn = mysqli_connect($servername, $username, $password, $db);
  if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
  }
  $table=$_SESSION['working_table'];
  $sql = "DELETE FROM $table WHERE 'ID'=$_POST['delete_by_id']";
  if ($conn->query($sql) === TRUE) {
    echo "Record deleted succcessfully ".$_POST['delete_by_id'];
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
  ?>
</body>
</html>
