<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
</head>
<body>
  <?php
  $servername="localhost";
  $username="root";
  $password="";
  $db="prodotti";
  $conn = mysqli_connect($servername, $username, $password);
  if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
  }
  else{
    $sql = "CREATE DATABASE IF NOT EXISTS ".$db;
    if ($conn->query($sql) === TRUE) {
      echo "Database queried correctly <br>";
      //here u can associate db and procedures
    }
    else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
  $conn = mysqli_connect($servername, $username, $password, $db);
  if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
  }
  //example of session use
  $table="frutteria";
  $_SESSION['working_table']=$table;

  $Sql = "SELECT * FROM ".$table." WHERE 1 ORDER BY `reparto`, `ID`";
  $result = mysqli_query($conn, $Sql);
  if($result===0){
    echo " no record added";
  }
  else{
    if (mysqli_num_rows($result) > 0) {
      echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
      <thead><th>id</th>
      <th>descrizione</th>
      <th>reparto</th>
      <th>prezzo</th>
      <th>quantità</th>
      </tr></thead><tbody>";
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
        <td>" . $row['ID']."</td>
        <td>" . $row['descrizione']."</td>
        <td>" . $row['reparto']."</td>
        <td>" . $row['prezzo']."</td>
        <td>" . $row['quantita']."</td>
        </tr>";
      }
      echo "</tbody></table></div>";
    }
    else {
      echo "you have no records";
    }
  }
  ?>
</body>
</html>
