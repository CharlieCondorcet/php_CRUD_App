<?php
include("db.php");

if(isset($_GET['id'])){
    $ed_id=$_GET['id'];
    $ed_query="SELECT * FROM task WHERE id=$ed_id";
    $ed_result=mysqli_query($connectionDB,$ed_query);
    if(mysqli_num_rows($ed_result)==1){
        $ed_filas= mysqli_fetch_array($ed_result);
        $ed_titulo=$ed_filas['title'];
        $ed_descrip=$ed_filas['description'];
    }
}

if(isset($_POST['edit_button'])){
    $actu_id=$_GET['id'];
    $actu_title=$_POST['edit_titulo'];
    $actu_desc=$_POST['edit_descrip'];

    $actu_query="UPDATE task set title='$actu_title', description='$actu_desc' 
    WHERE id='$actu_id'";
    mysqli_query($connectionDB,$actu_query);


    $_SESSION['message']='Tarea actualizada exitosamente';
    $_SESSION['message_type']= 'warning';

    header("Location: index.php");

}

?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?=$_GET['id'];?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="edit_titulo" value="<?=$ed_titulo; ?>"
                         class="form-control" placeholder="Cambiar titulo"">
                    </div>
                    <div class="form-group">
                        <textarea name="edit_descrip" rows="2" class="form-control"
                        placeholder="Cambiar descripcion" > <?=$ed_descrip;?> </textarea>
                    </div>
                    <button type="submit" class="btn btn-success" name="edit_button">
                        Actualizar
                    </button>
                </form>
            </div>

        </div>
    </div>

<?php  ?>