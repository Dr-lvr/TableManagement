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
  $conn = mysqli_connect($servername, $username, $password, $db);
  if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
  }
  $table="frutteria";
  $_SESSION['working_table']=$table;
  $table=$_SESSION['working_table'];
  $Sql = "SELECT `reparto`, SUM(prezzo) as _VALREP FROM ".$table." WHERE 1 GROUP BY `reparto`";
  $result = mysqli_query($conn, $Sql);
  if (mysqli_num_rows($result) > 0) {
    echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
    <thead>
    <th>reparto</th>
    <th>valore complessivo</th>
    </tr></thead><tbody>";
    while($row = mysqli_fetch_assoc($result)) {
      echo "<tr>
      <td>" . $row['reparto']."</td>
      <td>" . $row['_VALREP']." euro</td>
      </tr>";
    }
    echo "</tbody></table></div>";
  } else {
    echo "you have no records";
  }
  ?>
</body>
</html>
