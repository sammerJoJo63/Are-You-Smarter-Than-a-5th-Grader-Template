<?php
require '../config.php';
$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$tablename = TABLENAME;
$sql = "UPDATE $tablename SET played = 0 WHERE played = 1;";
$sql.= "UPDATE $tablename SET active = 0 WHERE active = 1;";
$result = mysqli_multi_query($conn, $sql);

mysqli_close($conn);
?>
