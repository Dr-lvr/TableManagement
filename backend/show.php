<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
</head>
<body>
  <script>
  function clickMe(){
  var result ="<?php php_func(); ?>"
  document.write(result);
  }
  </script>
<?php
function php_func(){
echo "Stay Safe";
}
$servername="localhost";
$username="root";
$password="";
$db="prodotti";
$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn){
  die("Connection failed: " . mysqli_connect_error());
}
//$table=$_SESSION['working_table'];
//echo var_dump($table);
$Sql = "SELECT * FROM frutteria WHERE 1";
          $result = mysqli_query($conn, $Sql);
          if (mysqli_num_rows($result) > 0) {
            echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
            <thead><th>id</th>
            <th>descrizione</th>
            <th>reparto</th>
            <th>prezzo</th>
            <th>quantità</th>
            </tr></thead><tbody>";
            while($row = mysqli_fetch_assoc($result)) {
              echo "<tr id=\"".$row['id']."\" name=\"".$row['id']."\"><td>" . $row['id']."</td>
              <td>" . $row['descrizione']."</td>
              <td>" . $row['reparto']."</td>
              <td>" . $row['prezzo']."</td>
              <td>" . $row['quantita']."</td>
              <td onclick=\"clickMe()\">modify</td>
              <td>delete</td>
              </tr>";
            }
            echo "</tbody></table></div>";
          } else {
            echo "you have no records";
          }
?>
</body>
</html>