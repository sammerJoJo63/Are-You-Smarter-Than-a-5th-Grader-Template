<?php
require '../config.php';
$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$tablename = TABLENAME;

$id = $_GET['id'];
//echo $id;
$sql = "SELECT * FROM $tablename WHERE ID = $id";
//echo $id;
$result = mysqli_query($conn, $sql);
$q = array();
if (mysqli_num_rows($result) > 0) {
  //echo("here");
  while($row = mysqli_fetch_assoc($result)) {
    //$int = settype($row['grade'], "integer");
    $q[] = $row;
    //array_push($grade, $int);
    echo json_encode($q);
   }
   //echo $row['ID'];
} else {
  echo "0 results";
}
mysqli_close($conn);
?>
