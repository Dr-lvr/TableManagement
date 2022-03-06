<?PHP
session_start();
$servername="localhost";
$username="root";
$password="";
$db="prodotti";
$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn){
  die("Connection failed: " . mysqli_connect_error());
}
require('../__easter_egg/fpdf.php');
$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',11);
function cleanData(&$str){
  $str = preg_replace("/\t/", "\\t", $str);
  $str = preg_replace("/\r?\n/", "\\n", $str);
  if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}
$table="frutteria";
$_SESSION['working_table']=$table;
$sql = "SELECT `ID`,`descrizione`,`reparto`,`prezzo`,`quantita` FROM ".$table." WHERE 1 ORDER BY `reparto`, `ID`";
$result = $conn->query($sql);
$index=$result->num_rows;
$header=array(0=>"ID", 1=>"descrizione", 2=>"reparto",  3=>"prezzo",  4=>"quantita");
$flag=false;
foreach($header as $col){
  if($flag==false){
    $pdf->Cell(50,5,$col,1);
    $flag=true;
  }
  else{
    $pdf->Cell(30,5,$col,1,0,"R");
  }
}
$flag=false;
$pdf->Ln();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    foreach($row as $col){
      if($flag==false){
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(50,5,$col,1,0,"L");
        $flag=true;
      }
      else {
        $pdf->SetFont('Arial','',11);
        $col=str_replace(",","?", $col);
        $col=str_replace(".",",", $col);
        $col=str_replace("?",".", $col);
        $pdf->Cell(30,5,$col,1,0,"R");
      }
    }
    $pdf->Ln();
    $flag=false;
  }
} else {
  echo "0 results";
}
$pdf->Output();
exit;
?>
