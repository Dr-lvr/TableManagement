<?php
session_start();
//$_SESSION['month']=$_POST['month'];
//$_SESSION['years']=$_POST['years'];
$servername="localhost";
$username="root";
$password="";
$db="prodotti";
$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn){
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
$descrizione=$_POST['descrizione'];
$reparto=$_POST['reparto'];
$prezzo=$_POST['prezzo'];
$quantita=$_POST['quantita'];

//$_SESSION['working_table']=$newtablename;
$newtablename="frutteria";
$_SESSION['working_table']=$newtablename;
$sql = "CALL CREATE_NEW(\"$newtablename\");";
if ($conn->query($sql) === TRUE) {
  echo "<script>alert(New table created successfully);</script>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "INSERT INTO \"$newtablename\" (descrizione, reparto, prezzo, quantita) VALUES ('$descrizione', '$reparto', '$prezzo', '$quantita')";
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
//header("location: ../index.html");
?>
