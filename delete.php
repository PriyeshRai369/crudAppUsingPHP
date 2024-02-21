<?php
$id = $_GET['uid'];
$serverName = "localhost";
$username = "root";
$password = "";
$database = "crudapp";

$conn = mysqli_connect($serverName, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$query = "DELETE FROM `crudinfo` WHERE `crudinfo`.`SrNo` = '$id'";
$result = mysqli_query($conn, $query);
header("location: /LearnPhp/webPractice/app.php");
?>