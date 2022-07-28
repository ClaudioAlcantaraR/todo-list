<?php
include("database.php");

/* if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM task WHERE `task`.`id` = $id";
    $result = mysqli_query($connectionDB, $query);

    if (!$result) {
        die("Query Failed");
    }

    $_SESSION['message'] = "Tarea borrada";
    $_SESSION['message_type'] = "danger";
    header("Location: index.php");
} */

/* ================================================= */

$id = $_POST['delete_id'];

$query = "DELETE FROM task WHERE `task`.`id` = $id";
$result = mysqli_query($connectionDB, $query);

if (!$result) {
    die("Query Failed");
}

/* TODO: La confirmación $_SESSION No funciona. Utilizar un mensaje desde javascript */
/* $_SESSION['message'] = "Tarea borrada";
$_SESSION['message_type'] = "danger";
 */
?>