<?php
include ('controller.php');
$con=connection();

$txtName = htmlspecialchars($_POST['txtName'],ENT_QUOTES,'UTF-8');
$txtCorreo = htmlspecialchars($_POST['txtCorreo'],ENT_QUOTES,'UTF-8');
$txtCommentary = htmlspecialchars($_POST['txtCommentary'],ENT_QUOTES,'UTF-8');

$sql="INSERT INTO comment (name,email,commentary) VALUES ('$txtName','$txtCorreo','$txtCommentary')";
$rs = mysqli_query($con,$sql);

if($sql)
{
    header("Location:contacto.html");}
if($rs){
    echo "Comentario enviado.";
}
?>