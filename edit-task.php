<?php
include("database.php");

 if (isset($_GET['id'])) {
     $id = $_GET['id'];
     $query = "SELECT * FROM task WHERE `task`.`id` = $id";
     $result = mysqli_query($connectionDB, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    }
 }

 if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    //Ejecutamos la consulta
    $query = "UPDATE `task` set `title` = '$title', `description` = '$description' WHERE `task`.`id` = $id";
    mysqli_query($connectionDB, $query);

    //Añadimos la notificacion de guardado
    $_SESSION['message'] = 'Tarea actualizada';
    $_SESSION['message_type'] = 'success';
    header('Location: index.php');
 }

?>

<?php include("sections/header.php")?>

<div class="container p-4">
    <div class="row">
        <h3 class="text-center">Modificar tarea</h3>
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit-task.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Titulo">
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control mt-3" placeholder="Descripción" ><?php echo $description; ?></textarea>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-success mt-3 btn-block" name="update">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include("sections/footer.php")?>