<?php
    include('controller.php');
    $con=connection();
    $id=$_GET['actualizaid'];

    $sql="SELECT * FROM comment WHERE id=$id";
    $rs=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($rs);
    $name = $row['name'];
    $email = $row['email'];
    $commentary = $row['commentary'];

    if(isset($_POST['submit'])){
        $name = htmlspecialchars($_POST['name'],ENT_QUOTES,'UTF-8');
        $email = htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');
        $commentary = htmlspecialchars($_POST['commentary'],ENT_QUOTES, 'UTF-8');
    
        $sql = "UPDATE comment SET id=$id, name='$name', email='$email', commentary='$commentary' WHERE id=$id";
        $rs = mysqli_query($con, $sql);
        ob_start();
        if($rs){
            // header('location: mostrar_tabla.php');
            echo "<script>alert('¡Comentario editado exitosamente!');</script>";
            
            ob_flush();

            echo "<script>
            setTimeout(function() {
                window.location.href = 'mostrar_tabla.php';
            }, 500);
            </script>";

        }
        else {
            die("Error al editar: ".mysqli_error($con));
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar comentario.</title>
    <link rel="stylesheet" href="estiloboot.css">
    <style>
        body{
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #080b1c;
        }
        nav {
            background-color: #403f85;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        nav a {
            color: #fff;
            font-weight: bold;
            text-decoration: none;
            margin: 0 50px;
        }
    </style>
</head>
<body>
    <nav>
        <a href="index.html">Inicio</a>
        <a href="sobre_mi.html" style="color:#080b1c">Sobre mí</a>
        <a href="proyectos.html">Proyectos</a>
        <a href="contacto.html" style="color:#080b1c">Contacto</a>
        <a href="mostrar_tabla.php">Ver CRUD</a>
    </nav>
    
    <br><br><br><br>
    <center>
    <br><br>
    <form method="POST">
        <table align="center" width="70%" style="color: #fff;">
            <tr>
                <td colspan="2" align="center" style="font-size: 50px; font-weight: bold;">&lt; Actualizar comentario /&gt;</td>
            </tr>
            <tr>
                <td colspan="2"><br><br><br></td>
            </tr>
            <tr style="font-size: 25px;">
                <td align="right">Nombre:</td>
                <td align="center"><input type="text" name="name" size="30cm" value=<?php echo $name; ?> required></td>
            </tr>
            <tr>
                <td colspan="2"><br><br></td>
            </tr>
            <tr style="font-size: 25px;">
                <td align="right">Email:</td>
                <td align="center"> <input type="email" name="email" size="30cm" value=<?php echo $email; ?> required></td>
            </tr>
            <tr>
                <td colspan="2"><br><br></td>
            </tr>
            <tr style="font-size: 25px;">
                <td align="right">Comentario:</td>
                <td align="center"> <textarea name="commentary" rows="3" cols="30" required><?php echo $commentary; ?></textarea></td></td>
            </tr>
        </table>
        <br><br><br>
        <div class="input-container" style="text-align: center;font-size: x-large;">
            <input type="submit" name="submit" value="Actualizar" style="width: 6em; height: 2em;">
        </div>
        <br><br><br>
    </form>
    </center>
    
</body>
</html>