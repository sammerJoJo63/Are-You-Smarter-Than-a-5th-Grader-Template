<?php
require '../config.php';
$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$id = $_GET['id'];
$tablename = TABLENAME;
$sql = "UPDATE $tablename SET active = 0 WHERE ID = $id AND active = 1";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
?>
