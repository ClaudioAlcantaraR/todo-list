<?php

include ("database.php");

    if (isset($_POST["save-task"])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        // Insertamos los datos en la tabla creada en php my admin
        $query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";
        $result = mysqli_query($connectionDB, $query);

        if (!$result) {
            die("Query Failed en añadir tarea");
        }

        //Añadimos notificacion de guardado
        $_SESSION['message'] = 'Tarea añadida';
        $_SESSION['message_type'] = 'success'; //Lo usamos para darle color al mensaje.

        //Con esto redireccionamos al usuario a donde queramos despues de añadir la tarea.
        header("Location: index.php");
    } 

?>  