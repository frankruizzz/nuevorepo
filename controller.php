<?php

function connection(){
    $host = "localhost";
    $user = "id22186459_root";
    $password = "180012506Fgrd$";
    $dbname = "id22186459_comments";

    $con=mysqli_connect($host,$user,$password,$dbname);
    mysqli_select_db($con,$dbname);

    return $con;
}

?>