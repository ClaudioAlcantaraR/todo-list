<?php

include ("database.php");

    if (isset($_POST["save-task"])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $priority = $_POST['priority'];
        $query = "INSERT INTO `task` (`title`, `description`, `priority`) VALUES ('$title', '$description', '$priority')";
        $result = mysqli_query($connectionDB, $query);

        if (!$result) {
            die("Query Failed");
        }

        //Añadimos notificacion de guardado
        $_SESSION['message'] = 'Tarea añadida';
        $_SESSION['message_type'] = 'success'; //Lo usamos para darle color al mensaje.

        //Con esto redireccionamos al usuario a donde queramos despues de añadir la tarea.
        header("Location: index.php");
    } 

?>  