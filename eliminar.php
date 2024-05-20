<?php
    include('controller.php');
    $con=connection();
    $id=$_GET['eliminaid'];
    
    $sql="DELETE FROM comment WHERE id=$id";
    $rs=mysqli_query($con,$sql);
    ob_start();
    if($rs){
        // header('location: mostrar_tabla.php');
        echo "<script>alert('¡Comentario eliminado!')</script>";
        
        ob_flush();

        echo "<script>
        setTimeout(function() {
            window.location.href = 'mostrar_tabla.php';
        }, 500);
        </script>";
    }
    else {
        die("Error al eliminar: ".mysqli_error($con));
    }
?>