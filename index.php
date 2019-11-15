<?php include ("db.php") ?>

<?php include ("includes/header.php") ?>


<div class="container p-4">
    <div class="row">
        <div class="col-md-4">


            <?php if(isset($_SESSION['message'])){ ?>
                <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <?php session_unset(); }?>


            <div class="card card-body">
                <form action="sabe_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control"
                        placeholder="Pon tu titulo" autofocus>
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control"
                        placeholder="Pon tu tarea"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" 
                    name="save_task_button" value="Guardar Tarea">
                </form>
            </div>

        </div>

        <div class="col-md-8">
            <table class="table table-bordered">;
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Creado a las</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                $consultas="SELECT*FROM task";
                $resultados=mysqli_query($connectionDB,$consultas);
                
                while($filas = mysqli_fetch_array($resultados)){ ?>
                    <tr>
                        <td><?=$filas['title'] ?> </td>
                        <td><?php echo $filas['description'] ?> </td>
                        <td> <?php echo $filas['created_at'] ?> </td>
                        <td>
                            <!--consulta con un id-->
                            <a href="edit.php?id=<?=$filas['id'] ?>" class="btn btn-secondary">
                                <i class="fas fa-marker"></i>
                             </a>
                             <a href="delete_task.php?id=<?=$filas['id'] ?>" class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                             </a>
                        </td>

                    </tr>
                    
                <?php } ?>
            </tbody>

               
            </table>

          

        </div>
    </div>

</div>





<?php include ("includes/footer.php") ?>

