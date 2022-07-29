<?php
include("database.php");

$id = $_POST['delete_id'];

$query = "DELETE FROM task WHERE `task`.`id` = $id";
$result = mysqli_query($connectionDB, $query);

if (!$result) {
    die("Query Failed");
}

?>