<?php

include ("db.php");

if(isset($_POST["save_task_button"])){
    $titl =$_POST['title'];
    $descri = $_POST['description'];
    
    $consul="INSERT INTO task(title,description) VALUES ('$titl','$descri') ";
    $result=mysqli_query($connectionDB,$consul);

    if(!$result){
        die("Query fallido!");
    }else{
        header("Location: index.php");
    }

}else{
    echo "no se guardo nada";
}
$_SESSION['message']="Tarea guardada correctamente";  //mensae de bootstrap
$_SESSION['message_type']='success'; //color en bootstrap, success=verde, danger=rojo


header("Location: index.php");

?>

