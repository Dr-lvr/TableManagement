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
  echo "Connected successfully<br>";
  $descrizione=$_POST['descrizione'];
  $reparto=$_POST['reparto'];
  $prezzo=$_POST['prezzo'];
  $quantita=$_POST['quantita'];
  //$newtablename=$_SESSION['working_table'];
  $newtablename="frutteria";
  $sql = "CALL CREATE_NEW(\"$newtablename\");";
  if ($conn->query($sql) === TRUE) {
    echo "New table created successfully<br>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $sql = "INSERT INTO ".$newtablename." (descrizione, reparto, prezzo, quantita) VALUES ('$descrizione', '$reparto', '$prezzo', '$quantita')";
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
  header("location: ../index.php");
}
?>
