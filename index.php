<?php include("bdcrud.php") ?>

<?php include("comprimido/header.php") ?>

<h1> </h1>

<div class="container p-4">


    <div class = "row">

        <div class= "col-md-4">

              <!-- MESSAGES -->

            <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
              <?= $_SESSION['message']?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"> &times; </span>
              </button>
            </div>
            <?php session_unset(); } ?>

            <div class = "card card-body">
                <form action="save_task.php" method="POST">
                    <div class = "form-group">
                        <input type= "text" name="title" class="form-control"
                        placeholder = "Escribe el titutlo de tarea" autofocus>
                    </div>

                    <div class = "form-group">
                        <textarea name="description" row = "2" class="form-control"
                        placeholder = "Escribe la descripción de la tarea" autofocus></textarea>
                    </div>

                    <input type= "submit" name ="save_task" class="btn btn-success btn-block"
                         value = "Guardar"></input>
                </form>
            </div>

        </div>

    </div>

</div>
<div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Fecha de Creación</th>
            <th>Acciones</th>
          </tr>
        </thead>

        <tbody>

          <?php
          $query = "SELECT * FROM task";
                                     /**Conexion */
          $result_tasks = mysqli_query($conn, $query);

          /**Recorrido de las tablas */
          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
                
              <a href="edit_task.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

<?php include("comprimido/footer.php") ?>
    

