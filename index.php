<?php include("database.php")?>
<?php include("./sections/header.php")?>

<div class="container-sm container-relative">
    <!-- Notificacion de mensaje guardado -->
    <?php
    if (isset($_SESSION['message'])) {?>
    <div id="alert" class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <!-- Limpiamos los datos que tenemos en sesion  -->
    <?php session_unset(); }?>
</div>
<div class="container p-4">
    <div class="row">
        <div class="col-lg-4 col-sm-12">
            <div class="card card-body">
                <form action="save-task.php" method="POST">
                    <div class="form-group mb-3">
                        <input type="text" name="title" class="form-control" placeholder="Tarea" autofocus required>
                    </div>
                    <div class="form-group mb-3">
                        <textarea name="description" rows="2" class="form-control"
                            placeholder="Descripción (opcional)"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <select name="priority" class="form-select">
                            <option value="baja">Baja</option>
                            <option value="media">Media</option>
                            <option value="alta">Alta</option>
                        </select>
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-light btn-block text-uppercase" name="save-task"
                            value="añadir">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-8 col-sm-12">
            <table id="task-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Prioridad</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //Seleccionamos todos los datos
                        $query = "SELECT * FROM `task`"; 
                        //La variable contiene todas las tareas guardadas.
                        $result_task = mysqli_query($connectionDB, $query);
                        while ($row = mysqli_fetch_array($result_task)) { ?>

                    <tr id="delete<?= $row['id']; ?>">
                        <td><?= $row['priority'];?></td>
                        <td><?= $row['title'];?></td>
                        <td><?= $row['description'];?></td>
                        <td><?= $row['created_at'];?></td>
                        <td class="text-center actions-btn">
                            <a class="btn btn-light" href="edit-task.php?id=<?= $row['id'];?>"><i
                                    class="fas fa-pen"></i></a>
                            <button onclick="deleteAjax(<?= $row['id']; ?>)" class="btn btn-light"><i
                                    class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    function deleteAjax(id) {
        $.ajax({
            type: 'POST',
            url: 'delete-task.php',
            data: {
                delete_id: id
            },
            success: function (data) {
                $('#delete' + id).hide();
            }
        });
    }
</script>

<?php include("./sections/footer.php")?>