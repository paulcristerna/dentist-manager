<?php 
    include("../core-saec/AccesoBD.php");
    include("../core-saec/Material.php");

    //actualizar precio a la BD

    $IdMaterial = $_GET['material'];
    $Precio = $_GET['precio-nuevo'];

    $Material = new Material($IdMaterial,'','',$Precio);

    if($_GET['tipo']=='1')
    {   
       $Material->ActualizarPrecio(); 
    }

    if($_GET['tipo']=='2')
    { 
       $Material->EliminarPrecio(); 
    }
?>