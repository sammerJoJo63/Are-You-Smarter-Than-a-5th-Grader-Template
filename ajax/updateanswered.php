<?php
require '../config.php';
$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$id = $_GET['id'];
$tablename = TABLENAME;
$sql = "UPDATE $tablename SET played = 1 WHERE ID = $id";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
?>
