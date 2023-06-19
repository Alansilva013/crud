<?php
/**Llamar la base de datos */
include('bdcrud.php');

/** Guardar el dato */
if (isset($_POST['save_task'])) {

    /**  */
    $title = $_POST['title'];

    $description = $_POST['description'];

    /** */
    $query = "INSERT INTO task (title, description) VALUES ('$title', '$description')";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Query Failed.");
    }

  /**Mensajes  */
  $_SESSION['message'] = 'Se ha guardado la tarea';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>