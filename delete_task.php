
<?php

include("db.php");

if(isset($_GET['id'])){
    $dlt_id= $_GET['id'];
    $dlt_query= "DELETE FROM task WHERE id=$dlt_id";
    $dlt_result= mysqli_query($connectionDB, $dlt_query);
    if(!$dlt_result){
        die("CONSULTA QUERY fallida");

    }

    $_SESSION['message']='tarea eliminada correctamente';
    $_SESSION['message_type']='danger';

    header("Location: index.php");
}

?>
