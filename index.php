<?php include("database.php")?>
<?php include("./sections/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <!-- Notificacion de mensaje guardado -->
            <?php
            if (isset($_SESSION['message'])) {?>
            <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <!-- Limpiamos los datos que tenemos en sesion  -->
            <?php session_unset(); }?>

            <div class="card card-body">
                <form action="save-task.php" method="post">
                    <div class="form-group mb-3">
                        <input type="text" name="title" class="form-control" placeholder="Tarea" autofocus required>
                    </div>
                    <div class="form-group mb-3">
                        <textarea name="description" rows="2" class="form-control" placeholder="Descripción (opcional)"></textarea>
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-light btn-block text-uppercase" name="save-task" value="añadir">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM task"; //Seleccionamos todos los datos
                        $result_task = mysqli_query($connectionDB, $query); //La variable contiene todas las tareas guardadas.

                        while ($row = mysqli_fetch_array($result_task)) { ?>
                            
                            <tr> <!-- IMPORTANTE: Los nombres deben ser identicos a los de la base de datos -->
                                <td><?= $row['title']?></td>
                                <td><?= $row['description']?></td>
                                <td><?= $row['created_at']?></td>

                                <td class="text-center actions-btn">
                                    <a class="btn btn-light" href="edit-task.php?id=<?= $row['id']?>"><i class="fas fa-pen"></i></a>
                                    <a class="btn btn-light" href="delete-task.php?id=<?= $row['id']?>"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include("./sections/footer.php")?>